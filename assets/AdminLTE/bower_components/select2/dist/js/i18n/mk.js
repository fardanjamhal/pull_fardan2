/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/mk", [], function () {
      return {
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "Ве молиме внесете " + e.maximum + " помалку карактер";
          return e.maximum !== 1 && (n += "и"), n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Ве молиме внесете уште " + e.maximum + " карактер";
          return e.maximum !== 1 && (n += "и"), n;
        },
        loadingMore: function () {
          return "Вчитување резултати…";
        },
        maximumSelected: function (e) {
          var t = "Можете да изберете само " + e.maximum + " ставк";
          return e.maximum === 1 ? (t += "а") : (t += "и"), t;
        },
        noResults: function () {
          return "Нема пронајдено совпаѓања";
        },
        searching: function () {
          return "Пребарување…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
