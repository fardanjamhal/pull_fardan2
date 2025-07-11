﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  function h(c, a) {
    var d = a.feed;
    this.caseSensitive = a.caseSensitive;
    this.marker = a.hasOwnProperty("marker") ? a.marker : "@";
    this.minChars =
      null !== a.minChars && void 0 !== a.minChars ? a.minChars : 2;
    var b;
    if (!(b = a.pattern)) {
      b = this.minChars;
      var g = "\\" + this.marker + "\\w",
        g = (b ? g + ("{" + b + ",}") : g + "*") + "$";
      b = new RegExp(g);
    }
    this.pattern = b;
    this.cache = void 0 !== a.cache ? a.cache : !0;
    this.throttle = void 0 !== a.throttle ? a.throttle : 200;
    this._autocomplete = new CKEDITOR.plugins.autocomplete(c, {
      textTestCallback: k(this.marker, this.minChars, this.pattern),
      dataCallback: m(d, this),
      itemTemplate: a.itemTemplate,
      outputTemplate: a.outputTemplate,
      throttle: this.throttle,
      itemsLimit: a.itemsLimit,
    });
  }
  function k(c, a, d) {
    function b(a, c) {
      var b = a.slice(0, c).match(d);
      if (!b) return null;
      var e = a[b.index - 1];
      return void 0 === e || e.match(/\s+/) ? { start: b.index, end: c } : null;
    }
    return function (a) {
      return a.collapsed ? CKEDITOR.plugins.textMatch.match(a, b) : null;
    };
  }
  function m(c, a) {
    return function (d, b) {
      function g() {
        var b = h(c).filter(function (b) {
          b = b.name;
          a.caseSensitive || ((b = b.toLowerCase()), (f = f.toLowerCase()));
          return 0 === b.indexOf(f);
        });
        e(b);
      }
      function h(a) {
        var b = 1;
        return CKEDITOR.tools.array.reduce(
          a,
          function (a, c) {
            a.push({ name: c, id: b++ });
            return a;
          },
          [],
        );
      }
      function k() {
        var b = new CKEDITOR.template(c).output({
          encodedQuery: encodeURIComponent(f),
        });
        if (a.cache && l[b]) return e(l[b]);
        CKEDITOR.ajax.load(b, function (c) {
          c = JSON.parse(c);
          a.cache && null !== c && (l[b] = c);
          e(c);
        });
      }
      function e(c) {
        c &&
          ((c = CKEDITOR.tools.array.map(c, function (b) {
            return CKEDITOR.tools.object.merge(b, { name: a.marker + b.name });
          })),
          b(c));
      }
      var f = d.query;
      a.marker && (f = f.substring(a.marker.length));
      CKEDITOR.tools.array.isArray(c)
        ? g()
        : "string" === typeof c
          ? k()
          : c({ query: f, marker: a.marker }, e);
    };
  }
  CKEDITOR._.mentions = { cache: {} };
  var l = CKEDITOR._.mentions.cache;
  CKEDITOR.plugins.add("mentions", {
    requires: "autocomplete,textmatch,ajax",
    instances: [],
    init: function (c) {
      var a = this;
      c.on("instanceReady", function () {
        CKEDITOR.tools.array.forEach(c.config.mentions || [], function (d) {
          a.instances.push(new h(c, d));
        });
      });
    },
  });
  h.prototype = {
    destroy: function () {
      this._autocomplete.destroy();
    },
  };
  CKEDITOR.plugins.mentions = h;
})();
