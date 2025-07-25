﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  var q = !1;
  CKEDITOR.plugins.add("balloonpanel", {
    init: function () {
      q ||
        (CKEDITOR.document.appendStyleSheet(
          this.path + "skins/" + CKEDITOR.skin.name + "/balloonpanel.css",
        ),
        (q = !0));
    },
  });
  CKEDITOR.ui.balloonPanel = function (a, b) {
    this.editor = a;
    CKEDITOR.tools.extend(
      this,
      {
        width: 360,
        height: "auto",
        triangleWidth: 20,
        triangleHeight: 20,
        triangleMinDistance: 40,
      },
      b,
      !0,
    );
    this.templates = {};
    for (var c in this.templateDefinitions)
      this.templates[c] = new CKEDITOR.template(this.templateDefinitions[c]);
    this.parts = {};
    this.focusables = {};
    this.showListeners = {};
    this.activeShowListeners = {};
    this.rect = { visible: !1 };
    this.build();
    a.on(
      "destroy",
      function () {
        this.destroy();
      },
      this,
    );
  };
  CKEDITOR.ui.balloonPanel.prototype = {
    templateDefinitions: {
      panel:
        '\x3cdiv class\x3d"cke {id} cke_reset_all cke_chrome cke_balloon cke_editor_{name} cke_{langDir} ' +
        CKEDITOR.env.cssClass +
        '" dir\x3d"{langDir}" title\x3d"' +
        (CKEDITOR.env.gecko ? " " : "") +
        '" lang\x3d"{langCode}" role\x3d"dialog" style\x3d"{style}" tabindex\x3d"-1" aria-labelledby\x3d"cke_{name}_arialbl"\x3e\x3c/div\x3e',
      content:
        '\x3cdiv class\x3d"cke_balloon_content"\x3e{content}\x3c/div\x3e',
      title:
        '\x3cdiv class\x3d"cke_balloon_title" role\x3d"presentation"\x3e{title}\x3c/div\x3e',
      close:
        '\x3ca class\x3d"cke_balloon_close_button" href\x3d"javascript:void(0)" title\x3d"Close" role\x3d"button" tabindex\x3d"-1"\x3e\x3cspan class\x3d"cke_label"\x3eX\x3c/span\x3e\x3c/a\x3e',
      triangleOuter:
        '\x3cspan class\x3d"cke_balloon_triangle cke_balloon_triangle_outer"\x3e\x3c/span\x3e',
      triangleInner:
        '\x3cspan class\x3d"cke_balloon_triangle cke_balloon_triangle_inner"\x3e\x26#8203;\x3c/span\x3e',
    },
    build: function () {
      var a = this.editor;
      this.parts = {
        title: CKEDITOR.dom.element.createFromHtml(
          this.templates.title.output({ title: this.title }),
        ),
        close: CKEDITOR.dom.element.createFromHtml(
          this.templates.close.output(),
        ),
        panel: CKEDITOR.dom.element.createFromHtml(
          this.templates.panel.output({
            id: a.id,
            langDir: a.lang.dir,
            langCode: a.langCode,
            name: a.name,
            style: "display:none;",
            voiceLabel: a.lang.editorPanel + ", " + a.name,
          }),
        ),
        content: CKEDITOR.dom.element.createFromHtml(
          this.templates.content.output({ content: this.content || "" }),
        ),
        triangleOuter: CKEDITOR.dom.element.createFromHtml(
          this.templates.triangleOuter.output(),
        ),
        triangleInner: CKEDITOR.dom.element.createFromHtml(
          this.templates.triangleInner.output(),
        ),
      };
      this.parts.panel.append(this.parts.title, 1);
      this.parts.panel.append(this.parts.close, 1);
      this.parts.panel.append(this.parts.triangleOuter);
      this.parts.panel.append(this.parts.content);
      this.parts.triangleOuter.append(this.parts.triangleInner);
      this.registerFocusable(this.parts.panel);
      this.registerFocusable(this.parts.close);
      this.parts.title.unselectable();
      this.parts.close.unselectable();
      CKEDITOR.document.getBody().append(this.parts.panel);
      this.resize(this.width, this.height);
      this.on("show", this.activateShowListeners, this);
      this.on("hide", this.deactivateShowListeners, this);
      this.parts.close.on(
        "click",
        function (a) {
          this.hide();
          a.data.preventDefault();
        },
        this,
      );
    },
    show: function () {
      this.rect.visible ||
        ((this.rect.visible = !0), this.parts.panel.show(), this.fire("show"));
    },
    hide: function () {
      this.rect.visible &&
        ((this.rect.visible = !1),
        this.parts.panel.hide(),
        this.blur(),
        this.fire("hide"));
    },
    blur: function () {
      this.editor.focus();
    },
    move: function (a, b) {
      this.rect.left = b;
      this.rect.top = a;
      this.parts.panel.setStyles({
        left: CKEDITOR.tools.cssLength(b),
        top: CKEDITOR.tools.cssLength(a),
      });
    },
    attach: (function () {
      function a(a, b) {
        var c = Math.max(
            0,
            Math.min(a.right, b.right) - Math.max(a.left, b.left),
          ),
          d = Math.max(
            0,
            Math.min(a.bottom, b.bottom) - Math.max(a.top, b.top),
          );
        return c * d;
      }
      function b(a, b, c, d) {
        a = { top: a, left: b };
        a.right = a.left + c;
        a.bottom = a.top + d;
        return a;
      }
      var c,
        p,
        t,
        r,
        q = {
          right: "left",
          top: "bottom",
          topLeft: "bottomLeft",
          topRight: "bottomRight",
          bottom: "top",
          bottomLeft: "topLeft",
          bottomRight: "topRight",
          left: "right",
        };
      return function (u, h) {
        if (h instanceof CKEDITOR.dom.element || !h) h = { focusElement: h };
        h = CKEDITOR.tools.extend(h, { show: !0 });
        !0 === h.show && this.show();
        this.fire("attach");
        c = CKEDITOR.document.getWindow();
        p = this.editor.window.getFrame();
        t = this.editor.editable();
        r = t.isInline();
        var n = this.getWidth(),
          d = this.getHeight(),
          f = u.getClientRect(!0),
          l = r ? t.getClientRect(!0) : p.getClientRect(!0),
          g = c.getViewPaneSize(),
          k = c.getScrollPosition(),
          g = {
            top: Math.max(l.top, k.y),
            left: Math.max(l.left, k.x),
            right: Math.min(l.right, g.width + k.x),
            bottom: Math.min(l.bottom, g.height + k.y),
          };
        r &&
          this.editor.elementMode === CKEDITOR.ELEMENT_MODE_INLINE &&
          ((g = this._getViewPaneRect(c)),
          (g.right += this.triangleWidth),
          (g.bottom += this.triangleHeight));
        this._adjustElementRect(f, r ? g : l);
        var l = n * d,
          f = this._getAlignments(f, n, d),
          e,
          m;
        for (m in f) {
          k = b(f[m].top, f[m].left, n, d);
          k = f[m].areaDifference = l - a(k, g);
          if (0 === k) {
            e = m;
            break;
          }
          e || (e = m);
          k < f[e].areaDifference && (e = m);
        }
        n = (d = this.parts.panel.getAscendant(function (a) {
          return a instanceof CKEDITOR.dom.document
            ? !1
            : "static" !== a.getComputedStyle("position");
        }))
          ? parseInt(d.getComputedStyle("margin-left"), 10)
          : 0;
        d = d ? parseInt(d.getComputedStyle("margin-top"), 10) : 0;
        this.move(f[e].top - d, f[e].left - n);
        e = e.split(" ");
        this.setTriangle(q[e[0]], e[1]);
        !1 !== h.focusElement && (h.focusElement || this.parts.panel).focus();
      };
    })(),
    resize: function (a, b) {
      this.rect.width = a;
      this.rect.height = b;
      this.parts.panel.setStyles({
        width: CKEDITOR.tools.cssLength(a),
        height: CKEDITOR.tools.cssLength(b),
      });
    },
    getWidth: function () {
      return "auto" === this.rect.width
        ? this.parts.panel.getClientRect().width
        : this.rect.width;
    },
    getHeight: function () {
      return "auto" === this.rect.height
        ? this.parts.panel.getClientRect().height
        : this.rect.height;
    },
    setTriangle: function (a, b) {
      var c = this.parts.triangleOuter,
        p = this.parts.triangleInner;
      this.triangleSide &&
        (c.removeClass("cke_balloon_triangle_" + this.triangleSide),
        c.removeClass("cke_balloon_triangle_align_" + this.triangleAlign),
        p.removeClass("cke_balloon_triangle_" + this.triangleSide));
      this.triangleSide = a;
      this.triangleAlign = b;
      c.addClass("cke_balloon_triangle_" + a);
      c.addClass("cke_balloon_triangle_align_" + b);
      p.addClass("cke_balloon_triangle_" + a);
    },
    registerFocusable: function (a) {
      this.editor.focusManager.add(a);
      this.focusables[a.getUniqueId()] = a;
    },
    deregisterFocusable: function (a) {
      this.editor.focusManager.remove(a);
      delete this.focusables[a.getUniqueId()];
    },
    addShowListener: function (a) {
      var b = CKEDITOR.tools.getNextNumber();
      this.showListeners[b] = a;
      this.rect.visible && this.activateShowListener(b);
      var c = this;
      return {
        removeListener: function () {
          c.removeShowListener(b);
        },
      };
    },
    removeShowListener: function (a) {
      this.deactivateShowListener(a);
      delete this.showListeners[a];
    },
    activateShowListener: function (a) {
      this.activeShowListeners[a] = this.showListeners[a].call(this);
    },
    deactivateShowListener: function (a) {
      this.activeShowListeners[a] &&
        this.activeShowListeners[a].removeListener();
      delete this.activeShowListeners[a];
    },
    activateShowListeners: function () {
      for (var a in this.showListeners) this.activateShowListener(a);
    },
    deactivateShowListeners: function () {
      for (var a in this.activeShowListeners) this.deactivateShowListener(a);
    },
    destroy: function () {
      this.deactivateShowListeners();
      this.parts.panel.remove();
    },
    setTitle: function (a) {
      this.parts.title.setHtml(a);
    },
    _getAlignments: function (a, b, c) {
      return {
        "right vcenter": {
          top: a.top + a.height / 2 - c / 2,
          left: a.right + this.triangleWidth,
        },
        "left vcenter": {
          top: a.top + a.height / 2 - c / 2,
          left: a.left - b - this.triangleWidth,
        },
        "top hcenter": {
          top: a.top - c - this.triangleHeight,
          left: a.left + a.width / 2 - b / 2,
        },
        "top left": {
          top: a.top - c - this.triangleHeight,
          left: a.left + a.width / 2 - this.triangleMinDistance,
        },
        "top right": {
          top: a.top - c - this.triangleHeight,
          left: a.right - a.width / 2 - b + this.triangleMinDistance,
        },
        "bottom hcenter": {
          top: a.bottom + this.triangleHeight,
          left: a.left + a.width / 2 - b / 2,
        },
        "bottom left": {
          top: a.bottom + this.triangleHeight,
          left: a.left + a.width / 2 - this.triangleMinDistance,
        },
        "bottom right": {
          top: a.bottom + this.triangleHeight,
          left: a.right - a.width / 2 - b + this.triangleMinDistance,
        },
      };
    },
    _adjustElementRect: function (a, b) {
      a.left = Math.max(b.left, Math.min(b.right - 1, a.left));
      a.right = Math.max(b.left, Math.min(b.right, a.right));
      a.top = Math.max(b.top, Math.min(b.bottom - 1, a.top));
      a.bottom = Math.max(b.top, Math.min(b.bottom, a.bottom));
    },
    _getViewPaneRect: function (a) {
      var b = a.getScrollPosition();
      a = a.getViewPaneSize();
      return {
        top: b.y,
        bottom: b.y + a.height,
        left: b.x,
        right: b.x + a.width,
      };
    },
  };
  CKEDITOR.event.implementOn(CKEDITOR.ui.balloonPanel.prototype);
})();
