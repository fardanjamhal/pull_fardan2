﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  function b(a, b, d) {
    this.editor = a;
    this.lastMatched = null;
    this.ignoreNext = !1;
    this.callback = b;
    this.ignoredKeys = [16, 17, 18, 91, 35, 36, 37, 38, 39, 40, 33, 34];
    this._listeners = [];
    this.throttle = d || 0;
    this._buffer = CKEDITOR.tools.throttle(
      this.throttle,
      function (a) {
        (a = this.callback(a))
          ? a.text != this.lastMatched &&
            ((this.lastMatched = a.text), this.fire("matched", a))
          : this.lastMatched && this.unmatch();
      },
      this,
    );
  }
  CKEDITOR.plugins.add("textwatcher", {});
  b.prototype = {
    attach: function () {
      function a() {
        var a = c.editable();
        this._listeners.push(a.attachListener(a, "keyup", b, this));
      }
      function b(a) {
        this.check(a);
      }
      function d() {
        this.unmatch();
      }
      var c = this.editor;
      this._listeners.push(c.on("contentDom", a, this));
      this._listeners.push(c.on("blur", d, this));
      this._listeners.push(c.on("beforeModeUnload", d, this));
      this._listeners.push(c.on("setData", d, this));
      this._listeners.push(c.on("afterCommandExec", d, this));
      c.editable() && a.call(this);
      return this;
    },
    check: function (a) {
      this.ignoreNext
        ? (this.ignoreNext = !1)
        : (a &&
            "keyup" == a.name &&
            -1 !=
              CKEDITOR.tools.array.indexOf(
                this.ignoredKeys,
                a.data.getKey(),
              )) ||
          ((a = this.editor.getSelection()) &&
            (a = a.getRanges()[0]) &&
            this._buffer.input(a));
    },
    consumeNext: function () {
      this.ignoreNext = !0;
      return this;
    },
    unmatch: function () {
      this.lastMatched = null;
      this.fire("unmatched");
      return this;
    },
    destroy: function () {
      CKEDITOR.tools.array.forEach(this._listeners, function (a) {
        a.removeListener();
      });
      this._listeners = [];
    },
  };
  CKEDITOR.event.implementOn(b.prototype);
  CKEDITOR.plugins.textWatcher = b;
})();
