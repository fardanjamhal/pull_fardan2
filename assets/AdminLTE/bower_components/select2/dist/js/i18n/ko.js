/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/ko", [], function () {
      return {
        errorLoading: function () {
          return "결과를 불러올 수 없습니다.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "너무 깁니다. " + t + " 글자 지워주세요.";
          return n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "너무 짧습니다. " + t + " 글자 더 입력해주세요.";
          return n;
        },
        loadingMore: function () {
          return "불러오는 중…";
        },
        maximumSelected: function (e) {
          var t = "최대 " + e.maximum + "개까지만 선택 가능합니다.";
          return t;
        },
        noResults: function () {
          return "결과가 없습니다.";
        },
        searching: function () {
          return "검색 중…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
