function explode(delimiter, string) {	// Split a string by string
  var emptyArray = { 0: '' };
  if (arguments.length != 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined') {
    return null;
  }
  if (delimiter === '' || delimiter === false || delimiter === null) {
    return false;
  }
  if (typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object') {
    return emptyArray;
  }
  if (delimiter === true) {
    delimiter = '1';
  }
  return string.toString().split(delimiter.toString());
}

var webpage = require('webpage');
var fs = require('fs');
var system = require('system');

(function() {
  if (system.args[1] === undefined) {
    console.log('Input 1st argument as list of URLs separated by comma');
    phantom.exit();
    return;
  }
  if (system.args[2] === undefined) {
    console.log('Input 2nd argument as path to destination folder');
    phantom.exit();
    return;
  }
  var urls = system.args[1];
  var folder = system.args[2];
  var capture = function(url, n, total) {
    var name = urls[i].replace(/\./g, '_');
    url = 'http://' + url;
    console.log('Open ' + url + ' (' + name + '). ' + n + '. total=' + total);
    var page = webpage.create();
    page.open(url, function(r) {
      console.log('Render ' + url + ' (' + name + '). ' + n + '. total=' + total);
      page.render(folder + '/' + name + '.png');
      if (n == total) phantom.exit();
    });
  };
  var urls = explode(",", urls);
  var total = urls.length;
  for (var i = 0; i < total; i++) capture(urls[i], i + 1, total);
})();
