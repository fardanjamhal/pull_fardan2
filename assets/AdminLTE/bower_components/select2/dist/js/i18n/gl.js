/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/gl", [], function () {
      return {
        errorLoading: function () {
          return "Non foi posíbel cargar os resultados.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum;
          return t === 1
            ? "Elimine un carácter"
            : "Elimine " + t + " caracteres";
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length;
          return t === 1 ? "Engada un carácter" : "Engada " + t + " caracteres";
        },
        loadingMore: function () {
          return "Cargando máis resultados…";
        },
        maximumSelected: function (e) {
          return e.maximum === 1
            ? "Só pode seleccionar un elemento"
            : "Só pode seleccionar " + e.maximum + " elementos";
        },
        noResults: function () {
          return "Non se atoparon resultados";
        },
        searching: function () {
          return "Buscando…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
