Vue.filter('dateFormat', function(value) {
  return moment(value).format('MM-DD-YYYY');
});

//Localization
//Vue.prototype.trans = string => _.get(window.i18n, string)

Vue.prototype.trans = (string, args) => {
  let value = _.get(window.i18n, string);

  _.eachRight(args, (paramVal, paramKey) => {
    value = _.replace(value, `:${paramKey}`, paramVal);
  });
  return value;
}

window.trans = string => _.get(window.i18n, string)

// clone
window.clone = function (obj) {
  return JSON.parse(JSON.stringify(obj))
}
