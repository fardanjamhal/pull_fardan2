/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/fa", [], function () {
      return {
        errorLoading: function () {
          return "امکان بارگذاری نتایج وجود ندارد.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "لطفاً " + t + " کاراکتر را حذف نمایید";
          return n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "لطفاً تعداد " + t + " کاراکتر یا بیشتر وارد نمایید";
          return n;
        },
        loadingMore: function () {
          return "در حال بارگذاری نتایج بیشتر...";
        },
        maximumSelected: function (e) {
          var t = "شما تنها می‌توانید " + e.maximum + " آیتم را انتخاب نمایید";
          return t;
        },
        noResults: function () {
          return "هیچ نتیجه‌ای یافت نشد";
        },
        searching: function () {
          return "در حال جستجو...";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
