(function() {
  if ( !navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ) return;

  jQuery('a[href^="sms:"]').attr('href', function() {
    // Convert: sms:+000?body=example
    // To iOS:  sms:+000;body=example (semicolon, not question mark)
    return jQuery(this).attr('href').replace(/sms:(\+?([0-9]*))?\?/, 'sms:$1/');
  });
})();