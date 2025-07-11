/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/bg", [], function () {
      return {
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "Моля въведете с " + t + " по-малко символ";
          return t > 1 && (n += "a"), n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Моля въведете още " + t + " символ";
          return t > 1 && (n += "a"), n;
        },
        loadingMore: function () {
          return "Зареждат се още…";
        },
        maximumSelected: function (e) {
          var t = "Можете да направите до " + e.maximum + " ";
          return e.maximum > 1 ? (t += "избора") : (t += "избор"), t;
        },
        noResults: function () {
          return "Няма намерени съвпадения";
        },
        searching: function () {
          return "Търсене…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
