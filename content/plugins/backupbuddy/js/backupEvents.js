// Update status log details, messages, or errors.
jQuery(document).on('backupbuddy_details backupbuddy_message backupbuddy_error', function(e, json) {
	if ( 'backupbuddy_error' == e.type ) {
		json.data = json.data + backupbuddyError( json.data );
	}
	backupbuddy_log( json.date + "\t" + json.run + "sec\t" + json.mem + "MB\t" + json.data );
});


// DEPRECATED. Base milestones off of startFunction and endFunction from now on.
jQuery(document).on( 'backupbuddy_milestone', function(e, json) {
	if ( 'finish_settings' == json.data ) {
		jQuery( '#pb_backupbuddy_slot1_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // Remove blinkage.
		jQuery( '#pb_backupbuddy_slot1_led' ).removeClass( 'pb_backupbuddy_empty' ); // Remove empty LED hole.
		jQuery( '#pb_backupbuddy_slot1_led' ).addClass( 'pb_backupbuddy_glow' ); // Solid LED.
	} else if ( 'start_database' == json.data ) {
		jQuery( '#pb_backupbuddy_slot2_led' ).addClass( 'pb_backupbuddy_activate' ); // Light BG
		jQuery( '#pb_backupbuddy_slot2_step' ).addClass( 'pb_backupbuddy_activate' ); // Light BG
		//jQuery( '#pb_backupbuddy_slot2_led' ).addClass( 'pb_backupbuddy_glow' ); // enable blinking
		jQuery( '#pb_backupbuddy_slot2_led' ).addClass( 'pb_backupbuddy_blinkz' ); // enable blinking
	} else if ( 'finish_database' == json.data ) {
		jQuery( '#pb_backupbuddy_slot2_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // Remove blinkage.
		jQuery( '#pb_backupbuddy_slot2_led' ).removeClass( 'pb_backupbuddy_empty' ); // Remove empty LED hole.
		jQuery( '#pb_backupbuddy_slot2_led' ).addClass( 'pb_backupbuddy_glow' ); // Solid LED.
	} else if ( 'start_files' == json.data ) {
		jQuery( '#pb_backupbuddy_slot3_led' ).addClass( 'pb_backupbuddy_blinkz' ); // Remove blinkage.
		jQuery( '#pb_backupbuddy_slot3_led' ).addClass( 'pb_backupbuddy_activate' ); // Light BG
		jQuery( '#pb_backupbuddy_slot3_step' ).addClass( 'pb_backupbuddy_activate' ); // Light BG
		jQuery( '#pb_backupbuddy_slot3' ).addClass( 'light' ); // lighten the bg
		jQuery( '#pb_backupbuddy_slot3_header' ).addClass( 'light' ); // use text made for lighter bg
	} else if ( 'finish_backup' == json.data ) {
		jQuery( '#pb_backupbuddy_stop' ).css( 'visibility', 'hidden' );
		jQuery( '#pb_backupbuddy_slot3_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // Remote blinkage.
		jQuery( '#pb_backupbuddy_slot3_led' ).removeClass( 'pb_backupbuddy_empty' ); // Remove empty LED hole.
		jQuery( '#pb_backupbuddy_slot3_led' ).addClass( 'pb_backupbuddy_glow' ); // Solid LED.
		jQuery( '#pb_backupbuddy_slot4_led' ).removeClass( 'pb_backupbuddy_empty' ); // Remove empty LED hole.
		jQuery( '#pb_backupbuddy_slot4_led' ).addClass( 'pb_backupbuddy_win' ); // set checkmark
		keep_polling = 0; // Stop polling server for status updates.
	}
});





// A backup function (step) began.
jQuery(document).on( 'backupbuddy_startFunction', function(e, json) {
	functionInfo = jQuery.parseJSON(json.data );
	html = '<div class="backup-step backup-step-primary backup-function-' + functionInfo.function + '"><span class="backup-step-status backup-step-status-working"></span><span class="backup-step-title">' + functionInfo.title + '</span></div>';
	jQuery( '.backup-steps' ).append( html );
	if ( '' !== backupbuddy_currentFunction ) {
		backupbuddyError( 'Warning #237832: A function began before the prior function reported completion. This should not normally happen and is usually caused by steps running out of order. This may be caused by a malfunctioning caching plugin.' );
	}
	backupbuddy_currentFunction = json.data;
});


// A backup function (step) finished.
jQuery(document).on( 'backupbuddy_finishFunction', function(e, json) {
	functionInfo = jQuery.parseJSON(json.data );
	jQuery( '.backup-function-' + functionInfo.function ).find( '.backup-step-status-working' ).removeClass( 'backup-step-status-working' ).addClass( 'backup-step-status-finished' );
	if ( json.data !== backupbuddy_currentFunction ) {
		backupbuddyError( 'Warning #32783: A function completed that does not match the function which was thought to be running.' );
	}
	backupbuddy_currentFunction = '';
});


// Track minor events so we can detect certain things not finishing, such as importbuddy generation.
jQuery(document).on( 'backupbuddy_startAction', function(e, json) {
	console.log( 'Starting action: ' + json.data );
	if ( '' !== backupbuddy_currentAction ) {
		backupbuddyError( 'Warning #8439834: An action began before the prior action completed. This should not normally happen and is usually caused by steps running out of order. This may be caused by a malfunctioning caching plugin.' );
	}
	backupbuddy_currentAction = json.data;
	backupbuddy_currentActionStart = unix_timestamp();
	backupbuddy_currentActionLastWarn = 0;
});


jQuery(document).on( 'backupbuddy_finishAction', function(e, json) {
	console.log( 'Finishing action: ' + json.data );
	if ( json.data !== backupbuddy_currentAction ) {
		backupbuddyError( 'Warning #3278374: An action completed that does not match the action which was thought to be running.' );
	}
	backupbuddy_currentAction = '';
	backupbuddy_currentActionStart = 0;
	backupbuddy_currentActionLastWarn = 0;
});


// An error was encountered running a function.
jQuery(document).on( 'backupbuddy_errorFunction', function(e, json) {
	functionInfo = jQuery.parseJSON(json.data );
	jQuery( '.backup-function-' + functionInfo.function ).find( '.backup-step-status-working' ).removeClass( 'backup-step-status-working' ).addClass( 'backup-step-status-error' );
});


// Start a subfunction. These are typically more minor, though still notable, events.
jQuery(document).on( 'backupbuddy_startSubFunction', function(e, json) {
	functionInfo = jQuery.parseJSON(json.data );
	html = '<div class="backup-step backup-step-secondary backup-function-' + functionInfo.function + '"><span class="backup-step-status"></span><span class="backup-step-title">' + functionInfo.title + '</span></div>';
	jQuery( '.backup-steps' ).append( html );
});


// The zip archive was deleted -- backup most likely was cancelled.
jQuery(document).on( 'backupbuddy_archiveDeleted', function(e, json) {
	jQuery( '#pb_backupbuddy_archive_url' ).addClass( 'button-disabled' );
	jQuery( '#pb_backupbuddy_archive_url' ).attr( 'onClick', 'return false;' );
	jQuery( '#pb_backupbuddy_archive_send' ).addClass( 'button-disabled' );
	jQuery( '#pb_backupbuddy_archive_send' ).attr( 'onClick', 'var event = arguments[0] || window.event; event.stopPropagation(); return false;' );
});


// Just pinged the server.
jQuery(document).on( 'backupbuddy_ping', function(e, json) {
	backupbuddy_log( date + '&#x0009;0sec&#x0009;&#x0009;0mb&#x0009;Ping. Waiting for server . . .' );
});


// An error message was sent from the server.
jQuery(document).on( 'backupbuddy_error', function(e, json) {
	console.log( 'BACKUPBUDDY ERROR: ' + json.data );
});

//var backupbuddy_actions = [];





// A warning message was sent from the server.
jQuery(document).on( 'backupbuddy_warning', function(e, json) {
	html = '<span class="backup-step-status backup-step-status-warning"></span><div class="backup-step backup-step-secondary"><span class="backup-step-title">' + json.data + '</span></div>';
	jQuery( '.backup-steps' ).append( html );
});


// Current size of the ZIP archive (formatted; eg "50 MB").
jQuery(document).on( 'backupbuddy_archiveSize', function(e, json) {
	if ( last_archive_size != json.data ) { // Track time archive size last changed.
		last_archive_size = json.data;
		last_archive_change = unix_timestamp();
	}
	jQuery( '.backupbuddy_archive_size' ).text( json.data );
});


// The entire backup process has been halted, whether by BackupBuddy or the user.
jQuery(document).on( 'backupbuddy_haltScript', function(e, json) {
	
	keep_polling = 0; // Stop polling server for status updates.
	
	jQuery( '.backup-step-status-working' ).removeClass( 'backup-step-status-working' ).addClass( 'backup-step-status-error' ); // Anything that was currently running turns into an error.
	jQuery( '#pb_backupbuddy_stop' ).css( 'visibility', 'hidden' );
	jQuery( '.pb_backupbuddy_blinkz' ).css( 'background-position', 'top' ); // turn off led
	jQuery( '#pb_backupbuddy_slot1_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // disable blinking
	jQuery( '#pb_backupbuddy_slot2_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // disable blinking
	jQuery( '#pb_backupbuddy_slot3_led' ).removeClass( 'pb_backupbuddy_blinkz' ); // disable blinking
	jQuery( '#pb_backupbuddy_slot4_led' ).removeClass( 'pb_backupbuddy_empty' ); // Remove empty LED hole.
	jQuery( '#pb_backupbuddy_slot4_led' ).addClass( 'pb_backupbuddy_codered' ); // set checkmark
	
	// Briefly wait
	//setTimeout(function(){
		backupbuddy_log( '***' );
		if ( '' !== backupbuddy_currentFunction ) {
			backupbuddy_log( '* Unfinished function: `' + backupbuddy_currentFunction + '`.' );
		} else {
			backupbuddy_log( '* No in-progress function detected.' );
		}
		
		if ( '' !== backupbuddy_currentAction ) {
			backupbuddy_log( '* Unfinished action: `' + backupbuddy_currentAction + '` (' + ( unix_timestamp() - backupbuddy_currentActionStart ) + ' ago).' );
		} else {
			backupbuddy_log( '* No in-progress action detected.' );
		}
		backupbuddy_log( '***' );
		
		// Calculate suggestions.
		/*
		if ( 'importbuddyCreation' == backupbuddy_currentAction ) {
			suggestions.push( {
				description: 'BackupBuddy by default includes a copy of the restore tool, importbuddy.php, inside the backup ZIP file for retrieval if needed in the future.',
				quickFix: 'Turn off inclusion of ImportBuddy. Navigate to Settings: Advanced Settings / Troubleshooting tab: Uncheck "Include ImportBuddy in full backup archive".',
				solution: 'Increase available PHP memory.'
			} );
		}
		*/
		
		backupbuddy_showSuggestions( suggestions );
		
		
	//},1000);
	setTimeout(function(){
		backupbuddy_log( '* The backup has halted.' );
	},500);
	
	alert( 'The backup has halted.' );
});


// We need to wait longer for initialization to complete.
jQuery(document).on( 'backupbuddy_wait_init', function(e, json) {
	--backup_init_complete_poll_retry_count;
});

