Vue.filter('dateFormat', function(value) {
  return moment(value).format('MM-DD-YYYY');
});

//Localization
Vue.prototype.trans = string => _.get(window.i18n, string)
window.trans = string => _.get(window.i18n, string)

// clone
window.clone = function (obj) {
  return JSON.parse(JSON.stringify(obj))
}
