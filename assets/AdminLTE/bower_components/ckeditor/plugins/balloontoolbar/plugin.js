﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  function e(a, b) {
    this.editor = a;
    this.options = b;
    this.toolbar = new CKEDITOR.ui.balloonToolbar(a);
    this.options &&
      "undefined" === typeof this.options.priority &&
      (this.options.priority = CKEDITOR.plugins.balloontoolbar.PRIORITY.MEDIUM);
    this._loadButtons();
  }
  function g(a) {
    this.editor = a;
    this._contexts = [];
    this._listeners = [];
    this._attachListeners();
  }
  var k = (function () {
    return CKEDITOR.tools.array.filter(
      [
        "matches",
        "msMatchesSelector",
        "webkitMatchesSelector",
        "mozMatchesSelector",
        "oMatchesSelector",
      ],
      function (a) {
        return window.HTMLElement ? a in HTMLElement.prototype : !1;
      },
    )[0];
  })();
  CKEDITOR.ui.balloonToolbarView = function (a, b) {
    b = CKEDITOR.tools.extend(b || {}, {
      width: "auto",
      triangleWidth: 7,
      triangleHeight: 7,
    });
    CKEDITOR.ui.balloonPanel.call(this, a, b);
    this._listeners = [];
  };
  CKEDITOR.ui.balloonToolbar = function (a, b) {
    this._view = new CKEDITOR.ui.balloonToolbarView(a, b);
    this._items = {};
  };
  CKEDITOR.ui.balloonToolbar.prototype.attach = function (a, b) {
    this._view.renderItems(this._items);
    this._view.attach(a, { focusElement: !1, show: !b });
  };
  CKEDITOR.ui.balloonToolbar.prototype.show = function () {
    this._view.show();
  };
  CKEDITOR.ui.balloonToolbar.prototype.hide = function () {
    this._view.hide();
  };
  CKEDITOR.ui.balloonToolbar.prototype.addItem = function (a, b) {
    this._items[a] = b;
  };
  CKEDITOR.ui.balloonToolbar.prototype.addItems = function (a) {
    for (var b in a) this.addItem(b, a[b]);
  };
  CKEDITOR.ui.balloonToolbar.prototype.getItem = function (a) {
    return this._items[a];
  };
  CKEDITOR.ui.balloonToolbar.prototype.deleteItem = function (a) {
    this._items[a] &&
      (delete this._items[a], this._view.renderItems(this._items));
  };
  CKEDITOR.ui.balloonToolbar.prototype.destroy = function () {
    this._pointedElement = null;
    this._view.destroy();
  };
  CKEDITOR.ui.balloonToolbar.prototype.refresh = function () {
    for (var a in this._items) {
      var b = this._view.editor.getCommand(this._items[a].command);
      b && b.refresh(this._view.editor, this._view.editor.elementPath());
    }
  };
  e.prototype = {
    destroy: function () {
      this.toolbar && this.toolbar.destroy();
    },
    show: function (a) {
      a && this.toolbar.attach(a);
      this.toolbar.show();
    },
    hide: function () {
      this.toolbar.hide();
    },
    refresh: function () {
      this.toolbar.refresh();
    },
    _matchRefresh: function (a, b) {
      var c = null;
      this.options.refresh &&
        (c = this.options.refresh(this.editor, a, b) || null) &&
        !1 === c instanceof CKEDITOR.dom.element &&
        (c = (a && a.lastElement) || this.editor.editable());
      return c;
    },
    _matchWidget: function () {
      var a = this.options.widgets,
        b = null;
      if (a) {
        var c =
          this.editor.widgets &&
          this.editor.widgets.focused &&
          this.editor.widgets.focused.name;
        "string" === typeof a && (a = a.split(","));
        -1 !== CKEDITOR.tools.array.indexOf(a, c) &&
          (b = this.editor.widgets.focused.element);
      }
      return b;
    },
    _matchElement: function (a) {
      return this.options.cssSelector && k && a.$[k](this.options.cssSelector)
        ? a
        : null;
    },
    _loadButtons: function () {
      var a = this.options.buttons;
      a &&
        ((a = a.split(",")),
        CKEDITOR.tools.array.forEach(
          a,
          function (a) {
            var c = this.editor.ui.create(a);
            c && this.toolbar.addItem(a, c);
          },
          this,
        ));
    },
  };
  g.prototype = {
    create: function (a) {
      a = new CKEDITOR.plugins.balloontoolbar.context(this.editor, a);
      this.add(a);
      return a;
    },
    add: function (a) {
      this._contexts.push(a);
    },
    check: function (a) {
      function b(a, b, c) {
        n(a, function (a) {
          if (!h || h.options.priority > a.options.priority) {
            var d = b(a, c);
            d instanceof CKEDITOR.dom.element && ((e = d), (h = a));
          }
        });
      }
      function c(a, b) {
        return a._matchElement(b);
      }
      a ||
        ((a = this.editor.getSelection()),
        CKEDITOR.tools.array.forEach(a.getRanges(), function (a) {
          a.shrink(CKEDITOR.SHRINK_ELEMENT, !0);
        }));
      if (a) {
        var n = CKEDITOR.tools.array.forEach,
          d = a.getRanges()[0],
          f = d && d.startPath(),
          e,
          h;
        b(this._contexts, function (b) {
          return b._matchRefresh(f, a);
        });
        b(this._contexts, function (a) {
          return a._matchWidget();
        });
        if (f)
          for (
            (d = a.getSelectedElement()) &&
              !d.isReadOnly() &&
              b(this._contexts, c, d),
              d = 0;
            d < f.elements.length;
            d++
          ) {
            var g = f.elements[d];
            g.isReadOnly() || b(this._contexts, c, g);
          }
        this.hide();
        h && h.show(e);
      }
    },
    hide: function () {
      CKEDITOR.tools.array.forEach(this._contexts, function (a) {
        a.hide();
      });
    },
    destroy: function () {
      CKEDITOR.tools.array.forEach(this._listeners, function (a) {
        a.removeListener();
      });
      this._listeners.splice(0, this._listeners.length);
      this._clear();
    },
    _clear: function () {
      CKEDITOR.tools.array.forEach(this._contexts, function (a) {
        a.destroy();
      });
      this._contexts.splice(0, this._contexts.length);
    },
    _refresh: function () {
      CKEDITOR.tools.array.forEach(this._contexts, function (a) {
        a.refresh();
      });
    },
    _attachListeners: function () {
      this._listeners.push(
        this.editor.on(
          "destroy",
          function () {
            this.destroy();
          },
          this,
        ),
        this.editor.on(
          "selectionChange",
          function () {
            this.check();
          },
          this,
        ),
        this.editor.on(
          "mode",
          function () {
            this.hide();
          },
          this,
          null,
          9999,
        ),
        this.editor.on(
          "blur",
          function () {
            this.hide();
          },
          this,
          null,
          9999,
        ),
        this.editor.on(
          "afterInsertHtml",
          function () {
            this.check();
            this._refresh();
          },
          this,
          null,
          9999,
        ),
      );
    },
  };
  var l = !1,
    m = !1;
  CKEDITOR.plugins.add("balloontoolbar", {
    requires: "balloonpanel",
    beforeInit: function (a) {
      m ||
        (CKEDITOR.document.appendStyleSheet(this.path + "skins/default.css"),
        CKEDITOR.document.appendStyleSheet(
          this.path + "skins/" + CKEDITOR.skin.name + "/balloontoolbar.css",
        ),
        (m = !0));
      a.balloonToolbars = new CKEDITOR.plugins.balloontoolbar.contextManager(a);
    },
    init: function (a) {
      a.balloonToolbars = new CKEDITOR.plugins.balloontoolbar.contextManager(a);
      l ||
        ((l = !0),
        (CKEDITOR.ui.balloonToolbarView.prototype = CKEDITOR.tools.extend(
          {},
          CKEDITOR.ui.balloonPanel.prototype,
        )),
        (CKEDITOR.ui.balloonToolbarView.prototype.build = function () {
          CKEDITOR.ui.balloonPanel.prototype.build.call(this);
          this.parts.panel.addClass("cke_balloontoolbar");
          this.parts.title.remove();
          this.deregisterFocusable(this.parts.close);
          this.parts.close.remove();
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype.show = function () {
          function a() {
            this.attach(this._pointedElement, { focusElement: !1 });
          }
          if (!this.rect.visible) {
            var c = this.editor.editable();
            this._detachListeners();
            this._listeners.push(this.editor.on("change", a, this));
            this._listeners.push(this.editor.on("resize", a, this));
            this._listeners.push(
              CKEDITOR.document.getWindow().on("resize", a, this),
            );
            this._listeners.push(
              c.attachListener(c.getDocument(), "scroll", a, this),
            );
            CKEDITOR.ui.balloonPanel.prototype.show.call(this);
          }
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype.hide = function () {
          this._detachListeners();
          CKEDITOR.ui.balloonPanel.prototype.hide.call(this);
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype.blur = function (a) {
          a && this.editor.focus();
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype._getAlignments = function (
          a,
          c,
          e,
        ) {
          a = CKEDITOR.ui.balloonPanel.prototype._getAlignments.call(
            this,
            a,
            c,
            e,
          );
          return {
            "bottom hcenter": a["bottom hcenter"],
            "top hcenter": a["top hcenter"],
          };
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype._detachListeners =
          function () {
            this._listeners.length &&
              (CKEDITOR.tools.array.forEach(this._listeners, function (a) {
                a.removeListener();
              }),
              (this._listeners = []));
          }),
        (CKEDITOR.ui.balloonToolbarView.prototype.destroy = function () {
          this._deregisterItemFocusables();
          CKEDITOR.ui.balloonPanel.prototype.destroy.call(this);
          this._detachListeners();
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype.renderItems = function (a) {
          var c = [],
            e = CKEDITOR.tools.objectKeys(a),
            d = !1;
          this._deregisterItemFocusables();
          CKEDITOR.tools.array.forEach(
            e,
            function (f) {
              CKEDITOR.ui.richCombo &&
              a[f] instanceof CKEDITOR.ui.richCombo &&
              d
                ? ((d = !1), c.push("\x3c/span\x3e"))
                : (CKEDITOR.ui.richCombo &&
                    a[f] instanceof CKEDITOR.ui.richCombo) ||
                  d ||
                  ((d = !0), c.push('\x3cspan class\x3d"cke_toolgroup"\x3e'));
              a[f].render(this.editor, c);
            },
            this,
          );
          d && c.push("\x3c/span\x3e");
          this.parts.content.setHtml(c.join(""));
          this.parts.content.unselectable();
          CKEDITOR.tools.array.forEach(
            this.parts.content.find("a").toArray(),
            function (a) {
              a.setAttribute("draggable", "false");
              this.registerFocusable(a);
            },
            this,
          );
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype.attach = function (a, c) {
          this._pointedElement = a;
          CKEDITOR.ui.balloonPanel.prototype.attach.call(this, a, c);
        }),
        (CKEDITOR.ui.balloonToolbarView.prototype._deregisterItemFocusables =
          function () {
            var a = this.focusables,
              c;
            for (c in a)
              this.parts.content.contains(a[c]) &&
                this.deregisterFocusable(a[c]);
          }));
    },
  });
  CKEDITOR.plugins.balloontoolbar = {
    context: e,
    contextManager: g,
    PRIORITY: { LOW: 999, MEDIUM: 500, HIGH: 10 },
  };
})();
