﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  function g(a) {
    return CKEDITOR.tools.capitalize(a, !0);
  }
  function n(a, c) {
    function b(a) {
      return function (b, d) {
        var c = b.widgets.focused,
          e = CKEDITOR.TRISTATE_DISABLED;
        c &&
          "easyimage" === c.name &&
          (e =
            a && a.call(this, c, b, d)
              ? CKEDITOR.TRISTATE_ON
              : CKEDITOR.TRISTATE_OFF);
        this.setState(e);
      };
    }
    function e(a, c, d, f) {
      d.type = "widget";
      d.widget = "easyimage";
      d.group = d.group || "easyimage";
      d.element = "figure";
      c = new CKEDITOR.style(d);
      a.filter.allow(c);
      c = new CKEDITOR.styleCommand(c);
      c.contextSensitive = !0;
      c.refresh = b(function (a, b, c) {
        return this.style.checkActive(c, b);
      });
      a.addCommand(f, c);
      c = a.getCommand(f);
      c.enable = function () {};
      c.refresh(a, a.elementPath());
      return c;
    }
    a.addCommand(
      "easyimageAlt",
      new CKEDITOR.dialogCommand("easyimageAlt", {
        startDisabled: !0,
        contextSensitive: !0,
        refresh: b(),
      }),
    );
    (function (b) {
      function c(a, b) {
        var d = a.match(/^easyimage(.+)$/);
        if (d) {
          var e = (d[1][0] || "").toLowerCase() + d[1].substr(1);
          if (d[1] in b) return d[1];
          if (e in b) return e;
        }
        return null;
      }
      a.on("afterCommandExec", function (d) {
        c(d.data.name, b) &&
          (a.forceNextSelectionCheck(), a.selectionChange(!0));
      });
      a.on("beforeCommandExec", function (d) {
        c(d.data.name, b) &&
          d.data.command.style.checkActive(d.editor.elementPath(), a) &&
          (d.cancel(), a.focus());
      });
      for (var d in b) e(a, d, b[d], "easyimage" + g(d));
    })(c);
  }
  function p(a) {
    var c = a.config.easyimage_toolbar;
    a.plugins.contextmenu &&
      (c.split && (c = c.split(",")),
      a.addMenuGroup("easyimage"),
      CKEDITOR.tools.array.forEach(c, function (b) {
        b = a.ui.items[b];
        a.addMenuItem(b.name, {
          label: b.label,
          command: b.command,
          group: "easyimage",
        });
      }));
  }
  function q(a) {
    var c = a.sender.editor,
      b = c.config.easyimage_toolbar;
    b.split && (b = b.split(","));
    CKEDITOR.tools.array.forEach(b, function (b) {
      b = c.ui.items[b];
      a.data[b.name] = c.getCommand(b.command).state;
    });
  }
  function r(a, c) {
    var b = a.config,
      e = b.easyimage_class,
      b = {
        name: "easyimage",
        allowedContent: {
          figure: { classes: b.easyimage_sideClass },
          img: { attributes: "!src,srcset,alt,width,sizes" },
        },
        requiredContent: "figure; img[!src]",
        styleableElements: "figure",
        supportedTypes: /image\/(jpeg|png|gif|bmp)/,
        loaderType: CKEDITOR.plugins.cloudservices.cloudServicesLoader,
        progressReporterType: CKEDITOR.plugins.imagebase.progressBar,
        upcasts: {
          figure: function (a) {
            if ((!e || a.hasClass(e)) && 1 === a.find("img", !0).length)
              return a;
          },
        },
        init: function () {
          function b(a, c) {
            var e = a.$;
            if (e.complete && e.naturalWidth) return c(e.naturalWidth);
            a.once("load", function () {
              c(e.naturalWidth);
            });
          }
          var c = this.parts.image;
          c &&
            !c.$.complete &&
            b(c, function () {
              var b = a._.easyImageToolbarContext.toolbar._view;
              b.rect.visible &&
                b.attach(b._pointedElement, { focusElement: !1 });
            });
          c = this.element.data("cke-upload-id");
          "undefined" !== typeof c &&
            (this.setData("uploadId", c),
            this.element.data("cke-upload-id", !1));
          this.on("contextMenu", q);
          a.config.easyimage_class && this.addClass(a.config.easyimage_class);
          this.on("uploadStarted", function () {
            var a = this;
            b(a.parts.image, function (b) {
              a.parts.image.hasAttribute("width") ||
                (a.editor.fire("lockSnapshot"),
                a.parts.image.setAttribute("width", b),
                a.editor.fire("unlockSnapshot"));
            });
          });
          this.on("uploadDone", function (a) {
            a = a.data.loader.responseData.response;
            var b = CKEDITOR.plugins.easyimage._parseSrcSet(a);
            this.parts.image.setAttributes({
              "data-cke-saved-src": a["default"],
              src: a["default"],
              srcset: b,
              sizes: "100vw",
            });
          });
          this.on("uploadFailed", function () {
            alert(this.editor.lang.easyimage.uploadFailed);
          });
          this._loadDefaultStyle();
        },
        _loadDefaultStyle: function () {
          var b = !1,
            e = a.config.easyimage_defaultStyle,
            d;
          for (d in c) {
            var f = a.getCommand("easyimage" + g(d));
            !b &&
              f &&
              f.style &&
              -1 !== CKEDITOR.tools.array.indexOf(f.style.group, "easyimage") &&
              this.checkStyleActive(f.style) &&
              (b = !0);
          }
          !b &&
            e &&
            a.getCommand("easyimage" + g(e)) &&
            this.applyStyle(a.getCommand("easyimage" + g(e)).style);
        },
      };
    e &&
      ((b.requiredContent += "(!" + e + ")"),
      (b.allowedContent.figure.classes =
        "!" + e + "," + b.allowedContent.figure.classes));
    a.plugins.link && (b = CKEDITOR.plugins.imagebase.addFeature(a, "link", b));
    b = CKEDITOR.plugins.imagebase.addFeature(a, "upload", b);
    b = CKEDITOR.plugins.imagebase.addFeature(a, "caption", b);
    CKEDITOR.plugins.imagebase.addImageWidget(a, "easyimage", b);
  }
  function t(a) {
    a.on("paste", function (c) {
      if (!a.isReadOnly && c.data.dataValue.match(/<img[\s\S]+data:/i)) {
        c = c.data;
        var b = document.implementation.createHTMLDocument(""),
          b = new CKEDITOR.dom.element(b.body),
          e = a.widgets.registered.easyimage,
          g = 0,
          h,
          d,
          f,
          l;
        b.data("cke-editable", 1);
        b.appendHtml(c.dataValue);
        d = b.find("img");
        for (l = 0; l < d.count(); l++) {
          f = d.getItem(l);
          var k = (h = f.getAttribute("src")) && "data:" == h.substring(0, 5),
            m = null === f.data("cke-realelement");
          k &&
            m &&
            !f.isReadOnly(1) &&
            (g++,
            1 < g &&
              ((k = a.getSelection().getRanges()),
              k[0].enlarge(CKEDITOR.ENLARGE_ELEMENT),
              k[0].collapse(!1)),
            h.match(/image\/([a-z]+?);/i),
            (k = e._spawnLoader(a, h, e)),
            (h = e._insertWidget(a, e, h, !1, { uploadId: k.id })),
            h.data("cke-upload-id", k.id),
            h.replace(f));
        }
        c.dataValue = b.getHtml();
      }
    });
  }
  function u(a) {
    a.ui.addButton("EasyImageUpload", {
      label: a.lang.easyimage.commands.upload,
      command: "easyimageUpload",
      toolbar: "insert,1",
    });
    a.addCommand("easyimageUpload", {
      exec: function () {
        var c = CKEDITOR.dom.element.createFromHtml(
          '\x3cinput type\x3d"file" accept\x3d"image/*" multiple\x3d"multiple"\x3e',
        );
        c.once("change", function (b) {
          b = b.data.getTarget();
          b.$.files.length &&
            a.fire("paste", {
              method: "paste",
              dataValue: "",
              dataTransfer: new CKEDITOR.plugins.clipboard.dataTransfer({
                files: b.$.files,
              }),
            });
        });
        c.$.click();
      },
    });
  }
  var m = !1;
  CKEDITOR.plugins.easyimage = {
    _parseSrcSet: function (a) {
      var c = [],
        b;
      for (b in a) "default" !== b && c.push(a[b] + " " + b + "w");
      return c.join(", ");
    },
  };
  CKEDITOR.plugins.add("easyimage", {
    requires: "imagebase,balloontoolbar,button,dialog,cloudservices",
    lang: "en",
    icons:
      "easyimagefull,easyimageside,easyimagealt,easyimagealignleft,easyimagealigncenter,easyimagealignright,easyimageupload",
    hidpi: !0,
    onLoad: function () {
      CKEDITOR.dialog.add(
        "easyimageAlt",
        this.path + "dialogs/easyimagealt.js",
      );
    },
    init: function (a) {
      if (!CKEDITOR.env.ie || 11 <= CKEDITOR.env.version)
        m ||
          (CKEDITOR.document.appendStyleSheet(
            this.path + "styles/easyimage.css",
          ),
          (m = !0)),
          a.addContentsCss &&
            a.addContentsCss(this.path + "styles/easyimage.css");
    },
    afterInit: function (a) {
      if (!CKEDITOR.env.ie || 11 <= CKEDITOR.env.version) {
        var c;
        c = CKEDITOR.tools.object.merge(
          {
            full: {
              attributes: { class: "easyimage-full" },
              label: a.lang.easyimage.commands.fullImage,
            },
            side: {
              attributes: { class: "easyimage-side" },
              label: a.lang.easyimage.commands.sideImage,
            },
            alignLeft: {
              attributes: { class: "easyimage-align-left" },
              label: a.lang.common.alignLeft,
            },
            alignCenter: {
              attributes: { class: "easyimage-align-center" },
              label: a.lang.common.alignCenter,
            },
            alignRight: {
              attributes: { class: "easyimage-align-right" },
              label: a.lang.common.alignRight,
            },
          },
          a.config.easyimage_styles,
        );
        r(a, c);
        t(a);
        n(a, c);
        a.ui.addButton("EasyImageAlt", {
          label: a.lang.easyimage.commands.altText,
          command: "easyimageAlt",
          toolbar: "easyimage,3",
        });
        for (var b in c)
          a.ui.addButton("EasyImage" + g(b), {
            label: c[b].label,
            command: "easyimage" + g(b),
            toolbar: "easyimage,99",
            icon: c[b].icon,
            iconHiDpi: c[b].iconHiDpi,
          });
        p(a);
        c = a.config.easyimage_toolbar;
        a._.easyImageToolbarContext = a.balloonToolbars.create({
          buttons: c.join ? c.join(",") : c,
          widgets: ["easyimage"],
        });
        u(a);
      }
    },
  });
  CKEDITOR.config.easyimage_class = "easyimage";
  CKEDITOR.config.easyimage_styles = {};
  CKEDITOR.config.easyimage_defaultStyle = "full";
  CKEDITOR.config.easyimage_toolbar = [
    "EasyImageFull",
    "EasyImageSide",
    "EasyImageAlt",
  ];
})();
