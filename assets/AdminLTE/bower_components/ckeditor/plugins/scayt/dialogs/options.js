﻿CKEDITOR.dialog.add("scaytDialog", function (c) {
  var d = c.scayt,
    k =
      '\x3cp\x3e\x3cimg alt\x3d"logo" title\x3d"logo" src\x3d"' +
      d.getLogo() +
      '" /\x3e\x3c/p\x3e\x3cp\x3e' +
      d.getLocal("version") +
      d.getVersion() +
      '\x3c/p\x3e\x3cp\x3e\x3ca href\x3d"' +
      d.getOption("CKUserManual") +
      '" target\x3d"_blank" style\x3d"text-decoration: underline; color: blue; cursor: pointer;"\x3e' +
      d.getLocal("btn_userManual") +
      "\x3c/a\x3e\x3c/p\x3e\x3cp\x3e" +
      d.getLocal("text_copyrights") +
      "\x3c/p\x3e",
    n = CKEDITOR.document,
    l = {
      isChanged: function () {
        return null === this.newLang || this.currentLang === this.newLang
          ? !1
          : !0;
      },
      currentLang: d.getLang(),
      newLang: null,
      reset: function () {
        this.currentLang = d.getLang();
        this.newLang = null;
      },
      id: "lang",
    },
    k = [
      {
        id: "options",
        label: d.getLocal("tab_options"),
        onShow: function () {},
        elements: [
          {
            type: "vbox",
            id: "scaytOptions",
            children: (function () {
              var b = d.getApplicationConfig(),
                a = [],
                e = {
                  "ignore-all-caps-words": "label_allCaps",
                  "ignore-domain-names": "label_ignoreDomainNames",
                  "ignore-words-with-mixed-cases": "label_mixedCase",
                  "ignore-words-with-numbers": "label_mixedWithDigits",
                },
                h;
              for (h in b)
                (b = { type: "checkbox" }),
                  (b.id = h),
                  (b.label = d.getLocal(e[h])),
                  a.push(b);
              return a;
            })(),
            onShow: function () {
              this.getChild();
              for (var b = c.scayt, a = 0; a < this.getChild().length; a++)
                this.getChild()[a].setValue(
                  b.getApplicationConfig()[this.getChild()[a].id],
                );
            },
          },
        ],
      },
      {
        id: "langs",
        label: d.getLocal("tab_languages"),
        elements: [
          {
            id: "leftLangColumn",
            type: "vbox",
            align: "left",
            widths: ["100"],
            children: [
              {
                type: "html",
                id: "langBox",
                style:
                  "overflow: hidden; white-space: normal;margin-bottom:15px;",
                html:
                  '\x3cdiv\x3e\x3cdiv style\x3d"float:left;width:45%;margin-left:5px;" id\x3d"left-col-' +
                  c.name +
                  '" class\x3d"scayt-lang-list"\x3e\x3c/div\x3e\x3cdiv style\x3d"float:left;width:45%;margin-left:15px;" id\x3d"right-col-' +
                  c.name +
                  '" class\x3d"scayt-lang-list"\x3e\x3c/div\x3e\x3c/div\x3e',
                onShow: function () {
                  var b = c.scayt.getLang();
                  n.getById("scaytLang_" + c.name + "_" + b).$.checked = !0;
                },
              },
            ],
          },
        ],
      },
      {
        id: "dictionaries",
        label: d.getLocal("tab_dictionaries"),
        elements: [
          {
            type: "vbox",
            id: "rightCol_col__left",
            children: [
              { type: "html", id: "dictionaryNote", html: "" },
              {
                type: "text",
                id: "dictionaryName",
                label: d.getLocal("label_fieldNameDic") || "Dictionary name",
                onShow: function (b) {
                  var a = b.sender,
                    e = c.scayt;
                  b = SCAYT.prototype.UILib;
                  var h = a
                    .getContentElement("dictionaries", "dictionaryName")
                    .getInputElement().$;
                  e.isLicensed() ||
                    ((h.disabled = !0), b.css(h, { cursor: "not-allowed" }));
                  setTimeout(function () {
                    a.getContentElement("dictionaries", "dictionaryNote")
                      .getElement()
                      .setText("");
                    null != e.getUserDictionaryName() &&
                      "" != e.getUserDictionaryName() &&
                      a
                        .getContentElement("dictionaries", "dictionaryName")
                        .setValue(e.getUserDictionaryName());
                  }, 0);
                },
              },
              {
                type: "hbox",
                id: "udButtonsHolder",
                align: "left",
                widths: ["auto"],
                style: "width:auto;",
                children: [
                  {
                    type: "button",
                    id: "createDic",
                    label: d.getLocal("btn_createDic"),
                    title: d.getLocal("btn_createDic"),
                    onLoad: function () {
                      this.getDialog();
                      var b = c.scayt,
                        a = SCAYT.prototype.UILib,
                        e = this.getElement().$,
                        h = this.getElement().getChild(0).$;
                      b.isLicensed() ||
                        (a.css(e, { cursor: "not-allowed" }),
                        a.css(h, { cursor: "not-allowed" }));
                    },
                    onClick: function () {
                      var b = this.getDialog(),
                        a = g,
                        e = c.scayt,
                        h = b
                          .getContentElement("dictionaries", "dictionaryName")
                          .getValue();
                      e.isLicensed() &&
                        e.createUserDictionary(
                          h,
                          function (f) {
                            f.error ||
                              a.toggleDictionaryState.call(
                                b,
                                "dictionaryState",
                              );
                            f.dialog = b;
                            f.command = "create";
                            f.name = h;
                            c.fire("scaytUserDictionaryAction", f);
                          },
                          function (a) {
                            a.dialog = b;
                            a.command = "create";
                            a.name = h;
                            c.fire("scaytUserDictionaryActionError", a);
                          },
                        );
                    },
                  },
                  {
                    type: "button",
                    id: "restoreDic",
                    label: d.getLocal("btn_connectDic"),
                    title: d.getLocal("btn_connectDic"),
                    onLoad: function () {
                      this.getDialog();
                      var b = c.scayt,
                        a = SCAYT.prototype.UILib,
                        e = this.getElement().$,
                        h = this.getElement().getChild(0).$;
                      b.isLicensed() ||
                        (a.css(e, { cursor: "not-allowed" }),
                        a.css(h, { cursor: "not-allowed" }));
                    },
                    onClick: function () {
                      var b = this.getDialog(),
                        a = c.scayt,
                        e = g,
                        h = b
                          .getContentElement("dictionaries", "dictionaryName")
                          .getValue();
                      a.isLicensed() &&
                        a.restoreUserDictionary(
                          h,
                          function (a) {
                            a.dialog = b;
                            a.error ||
                              e.toggleDictionaryState.call(
                                b,
                                "dictionaryState",
                              );
                            a.command = "restore";
                            a.name = h;
                            c.fire("scaytUserDictionaryAction", a);
                          },
                          function (a) {
                            a.dialog = b;
                            a.command = "restore";
                            a.name = h;
                            c.fire("scaytUserDictionaryActionError", a);
                          },
                        );
                    },
                  },
                  {
                    type: "button",
                    id: "disconnectDic",
                    label: d.getLocal("btn_disconnectDic"),
                    title: d.getLocal("btn_disconnectDic"),
                    onClick: function () {
                      var b = this.getDialog(),
                        a = c.scayt,
                        e = g,
                        h = b.getContentElement(
                          "dictionaries",
                          "dictionaryName",
                        ),
                        f = h.getValue();
                      a.isLicensed() &&
                        (a.disconnectFromUserDictionary({}),
                        h.setValue(""),
                        e.toggleDictionaryState.call(b, "initialState"),
                        c.fire("scaytUserDictionaryAction", {
                          dialog: b,
                          command: "disconnect",
                          name: f,
                        }));
                    },
                  },
                  {
                    type: "button",
                    id: "removeDic",
                    label: d.getLocal("btn_deleteDic"),
                    title: d.getLocal("btn_deleteDic"),
                    onClick: function () {
                      var b = this.getDialog(),
                        a = c.scayt,
                        e = g,
                        h = b.getContentElement(
                          "dictionaries",
                          "dictionaryName",
                        ),
                        f = h.getValue();
                      a.isLicensed() &&
                        a.removeUserDictionary(
                          f,
                          function (a) {
                            h.setValue("");
                            a.error ||
                              e.toggleDictionaryState.call(b, "initialState");
                            a.dialog = b;
                            a.command = "remove";
                            a.name = f;
                            c.fire("scaytUserDictionaryAction", a);
                          },
                          function (a) {
                            a.dialog = b;
                            a.command = "remove";
                            a.name = f;
                            c.fire("scaytUserDictionaryActionError", a);
                          },
                        );
                    },
                  },
                  {
                    type: "button",
                    id: "renameDic",
                    label: d.getLocal("btn_renameDic"),
                    title: d.getLocal("btn_renameDic"),
                    onClick: function () {
                      var b = this.getDialog(),
                        a = c.scayt,
                        e = b
                          .getContentElement("dictionaries", "dictionaryName")
                          .getValue();
                      a.isLicensed() &&
                        a.renameUserDictionary(
                          e,
                          function (a) {
                            a.dialog = b;
                            a.command = "rename";
                            a.name = e;
                            c.fire("scaytUserDictionaryAction", a);
                          },
                          function (a) {
                            a.dialog = b;
                            a.command = "rename";
                            a.name = e;
                            c.fire("scaytUserDictionaryActionError", a);
                          },
                        );
                    },
                  },
                  {
                    type: "button",
                    id: "editDic",
                    label: d.getLocal("btn_goToDic"),
                    title: d.getLocal("btn_goToDic"),
                    onLoad: function () {
                      this.getDialog();
                    },
                    onClick: function () {
                      var b = this.getDialog(),
                        a = b.getContentElement("dictionaries", "addWordField");
                      g.clearWordList.call(b);
                      a.setValue("");
                      g.getUserDictionary.call(b);
                      g.toggleDictionaryState.call(b, "wordsState");
                    },
                  },
                ],
              },
              {
                type: "hbox",
                id: "dicInfo",
                align: "left",
                children: [
                  {
                    type: "html",
                    id: "dicInfoHtml",
                    html:
                      '\x3cdiv id\x3d"dic_info_editor1" style\x3d"margin:5px auto; width:95%;white-space:normal;"\x3e' +
                      (c.scayt.isLicensed && c.scayt.isLicensed()
                        ? '\x3ca href\x3d"' +
                          d.getOption("CKUserManual") +
                          '" target\x3d"_blank" style\x3d"text-decoration: underline; color: blue; cursor: pointer;"\x3e' +
                          d.getLocal("text_descriptionDicForPaid") +
                          "\x3c/a\x3e"
                        : d.getLocal("text_descriptionDicForFree")) +
                      "\x3c/div\x3e",
                  },
                ],
              },
              {
                id: "addWordAction",
                type: "hbox",
                style: "width: 100%; margin-bottom: 0;",
                widths: ["40%", "60%"],
                children: [
                  {
                    id: "addWord",
                    type: "vbox",
                    style: "min-width: 150px;",
                    children: [
                      {
                        type: "text",
                        id: "addWordField",
                        label: "Add word",
                        maxLength: "64",
                      },
                    ],
                  },
                  {
                    id: "addWordButtons",
                    type: "vbox",
                    style: "margin-top: 20px;",
                    children: [
                      {
                        type: "hbox",
                        id: "addWordButton",
                        align: "left",
                        children: [
                          {
                            type: "button",
                            id: "addWord",
                            label: d.getLocal("btn_addWord"),
                            title: d.getLocal("btn_addWord"),
                            onClick: function () {
                              var b = this.getDialog(),
                                a = c.scayt,
                                e = b.getContentElement(
                                  "dictionaries",
                                  "itemList",
                                ),
                                h = b.getContentElement(
                                  "dictionaries",
                                  "addWordField",
                                ),
                                f = h.getValue(),
                                d = a.getOption("wordBoundaryRegex"),
                                g = this;
                              f &&
                                (-1 !== f.search(d)
                                  ? c.fire("scaytUserDictionaryAction", {
                                      dialog: b,
                                      command: "wordWithBannedSymbols",
                                      name: f,
                                      error: !0,
                                    })
                                  : e.inChildren(f)
                                    ? (h.setValue(""),
                                      c.fire("scaytUserDictionaryAction", {
                                        dialog: b,
                                        command: "wordAlreadyAdded",
                                        name: f,
                                      }))
                                    : (this.disable(),
                                      a.addWordToUserDictionary(
                                        f,
                                        function (a) {
                                          a.error ||
                                            (h.setValue(""), e.addChild(f, !0));
                                          a.dialog = b;
                                          a.command = "addWord";
                                          a.name = f;
                                          g.enable();
                                          c.fire(
                                            "scaytUserDictionaryAction",
                                            a,
                                          );
                                        },
                                        function (a) {
                                          a.dialog = b;
                                          a.command = "addWord";
                                          a.name = f;
                                          g.enable();
                                          c.fire(
                                            "scaytUserDictionaryActionError",
                                            a,
                                          );
                                        },
                                      )));
                            },
                          },
                          {
                            type: "button",
                            id: "backToDic",
                            label: d.getLocal("btn_dictionaryPreferences"),
                            title: d.getLocal("btn_dictionaryPreferences"),
                            align: "right",
                            onClick: function () {
                              var b = this.getDialog(),
                                a = c.scayt;
                              null != a.getUserDictionaryName() &&
                              "" != a.getUserDictionaryName()
                                ? g.toggleDictionaryState.call(
                                    b,
                                    "dictionaryState",
                                  )
                                : g.toggleDictionaryState.call(
                                    b,
                                    "initialState",
                                  );
                            },
                          },
                        ],
                      },
                    ],
                  },
                ],
              },
              {
                id: "wordsHolder",
                type: "hbox",
                style: "width: 100%; height: 170px; margin-bottom: 0;",
                children: [
                  {
                    type: "scaytItemList",
                    id: "itemList",
                    align: "left",
                    style: "width: 100%; height: 170px; overflow: auto",
                    onClick: function (b) {
                      var a = b.data.$;
                      b = c.scayt;
                      var e = SCAYT.prototype.UILib,
                        a = a.target || a.srcElement,
                        h = e.parent(a)[0],
                        f = e.attr(h, "data-cke-scayt-ud-word"),
                        d = this.getDialog(),
                        g = d.getContentElement("dictionaries", "itemList"),
                        q = this;
                      e.hasClass(a, "cke_scaytItemList_remove") &&
                        !this.isBlocked() &&
                        (this.block(),
                        b.deleteWordFromUserDictionary(
                          f,
                          function (a) {
                            a.error || g.removeChild(h, f);
                            q.unblock();
                            a.dialog = d;
                            a.command = "deleteWord";
                            a.name = f;
                            c.fire("scaytUserDictionaryAction", a);
                          },
                          function (a) {
                            q.unblock();
                            a.dialog = d;
                            a.command = "deleteWord";
                            a.name = f;
                            c.fire("scaytUserDictionaryActionError", a);
                          },
                        ));
                    },
                  },
                ],
              },
            ],
          },
        ],
      },
      {
        id: "about",
        label: d.getLocal("tab_about"),
        elements: [
          {
            type: "html",
            id: "about",
            style: "margin: 5px 5px;",
            html:
              '\x3cdiv\x3e\x3cdiv id\x3d"scayt_about_"\x3e' +
              k +
              "\x3c/div\x3e\x3c/div\x3e",
          },
        ],
      },
    ];
  c.on("scaytUserDictionaryAction", function (b) {
    var a = SCAYT.prototype.UILib,
      e = b.data.dialog,
      c = e.getContentElement("dictionaries", "dictionaryNote").getElement(),
      f = b.editor.scayt,
      d;
    void 0 === b.data.error
      ? ((d = f.getLocal("message_success_" + b.data.command + "Dic")),
        (d = d.replace("%s", b.data.name)),
        c.setText(d),
        a.css(c.$, { color: "blue" }))
      : ("" === b.data.name
          ? c.setText(f.getLocal("message_info_emptyDic"))
          : ((d = f.getLocal("message_error_" + b.data.command + "Dic")),
            (d = d.replace("%s", b.data.name)),
            c.setText(d)),
        a.css(c.$, { color: "red" }),
        null != f.getUserDictionaryName() && "" != f.getUserDictionaryName()
          ? e
              .getContentElement("dictionaries", "dictionaryName")
              .setValue(f.getUserDictionaryName())
          : e.getContentElement("dictionaries", "dictionaryName").setValue(""));
  });
  c.on("scaytUserDictionaryActionError", function (b) {
    var a = SCAYT.prototype.UILib,
      e = b.data.dialog,
      c = e.getContentElement("dictionaries", "dictionaryNote").getElement(),
      d = b.editor.scayt,
      g;
    "" === b.data.name
      ? c.setText(d.getLocal("message_info_emptyDic"))
      : ((g = d.getLocal("message_error_" + b.data.command + "Dic")),
        (g = g.replace("%s", b.data.name)),
        c.setText(g));
    a.css(c.$, { color: "red" });
    null != d.getUserDictionaryName() && "" != d.getUserDictionaryName()
      ? e
          .getContentElement("dictionaries", "dictionaryName")
          .setValue(d.getUserDictionaryName())
      : e.getContentElement("dictionaries", "dictionaryName").setValue("");
  });
  var g = {
    title: "SCAYT",
    resizable: CKEDITOR.DIALOG_RESIZE_BOTH,
    minWidth: "moono-lisa" == (CKEDITOR.skinName || c.config.skin) ? 450 : 340,
    minHeight: 300,
    onLoad: function () {
      if (0 != c.config.scayt_uiTabs[1]) {
        var b = g,
          a = b.getLangBoxes.call(this);
        this.getContentElement("dictionaries", "addWordField");
        a.getParent().setStyle("white-space", "normal");
        b.renderLangList(a);
        this.definition.minWidth = this.getSize().width;
        this.resize(this.definition.minWidth, this.definition.minHeight);
      }
    },
    onCancel: function () {
      l.reset();
    },
    onHide: function () {
      c.unlockSelection();
    },
    onShow: function () {
      c.fire("scaytDialogShown", this);
      if (0 != c.config.scayt_uiTabs[2]) {
        var b = this.getContentElement("dictionaries", "addWordField");
        g.clearWordList.call(this);
        b.setValue("");
        g.getUserDictionary.call(this);
        g.toggleDictionaryState.call(this, "wordsState");
      }
    },
    onOk: function () {
      var b = g,
        a = c.scayt;
      this.getContentElement("options", "scaytOptions");
      b = b.getChangedOption.call(this);
      a.commitOption({ changedOptions: b });
    },
    toggleDictionaryButtons: function (b) {
      var a = this.getContentElement("dictionaries", "existDic")
          .getElement()
          .getParent(),
        c = this.getContentElement("dictionaries", "notExistDic")
          .getElement()
          .getParent();
      b ? (a.show(), c.hide()) : (a.hide(), c.show());
    },
    getChangedOption: function () {
      var b = {};
      if (1 == c.config.scayt_uiTabs[0])
        for (
          var a = this.getContentElement("options", "scaytOptions").getChild(),
            e = 0;
          e < a.length;
          e++
        )
          a[e].isChanged() && (b[a[e].id] = a[e].getValue());
      l.isChanged() &&
        (b[l.id] = c.config.scayt_sLang = l.currentLang = l.newLang);
      return b;
    },
    buildRadioInputs: function (b, a, e) {
      e = new CKEDITOR.dom.element("div");
      var d = "scaytLang_" + c.name + "_" + a,
        f = CKEDITOR.dom.element.createFromHtml(
          '\x3cinput id\x3d"' +
            d +
            '" type\x3d"radio"  value\x3d"' +
            a +
            '" name\x3d"scayt_lang" /\x3e',
        ),
        g = new CKEDITOR.dom.element("label"),
        k = c.scayt;
      e.setStyles({
        "white-space": "normal",
        position: "relative",
        "padding-bottom": "2px",
      });
      f.on("click", function (a) {
        l.newLang = a.sender.getValue();
      });
      g.appendText(b);
      g.setAttribute("for", d);
      e.append(f);
      e.append(g);
      a === k.getLang() &&
        (f.setAttribute("checked", !0),
        f.setAttribute("defaultChecked", "defaultChecked"));
      return e;
    },
    renderLangList: function (b) {
      var a = b.find("#left-col-" + c.name).getItem(0);
      b = b.find("#right-col-" + c.name).getItem(0);
      var e = d.getScaytLangList(),
        h = d.getGraytLangList(),
        f = {},
        g = [],
        k = 0,
        l = !1,
        m;
      for (m in e.ltr) f[m] = e.ltr[m];
      for (m in e.rtl) f[m] = e.rtl[m];
      for (m in f) g.push([m, f[m]]);
      g.sort(function (a, b) {
        var c = 0;
        a[1] > b[1] ? (c = 1) : a[1] < b[1] && (c = -1);
        return c;
      });
      f = {};
      for (l = 0; l < g.length; l++) f[g[l][0]] = g[l][1];
      g = Math.round(g.length / 2);
      for (m in f)
        k++,
          (l = m in h.ltr || m in h.rtl),
          this.buildRadioInputs(f[m], m, l).appendTo(k <= g ? a : b);
    },
    getLangBoxes: function () {
      return this.getContentElement("langs", "langBox").getElement();
    },
    toggleDictionaryState: function (b) {
      var a = this.getContentElement("dictionaries", "dictionaryName")
          .getElement()
          .getParent(),
        c = this.getContentElement("dictionaries", "udButtonsHolder")
          .getElement()
          .getParent(),
        d = this.getContentElement("dictionaries", "createDic")
          .getElement()
          .getParent(),
        f = this.getContentElement("dictionaries", "restoreDic")
          .getElement()
          .getParent(),
        g = this.getContentElement("dictionaries", "disconnectDic")
          .getElement()
          .getParent(),
        l = this.getContentElement("dictionaries", "removeDic")
          .getElement()
          .getParent(),
        k = this.getContentElement("dictionaries", "renameDic")
          .getElement()
          .getParent(),
        m = this.getContentElement("dictionaries", "dicInfo")
          .getElement()
          .getParent(),
        n = this.getContentElement("dictionaries", "addWordAction")
          .getElement()
          .getParent(),
        p = this.getContentElement("dictionaries", "wordsHolder")
          .getElement()
          .getParent();
      switch (b) {
        case "initialState":
          a.show();
          c.show();
          d.show();
          f.show();
          g.hide();
          l.hide();
          k.hide();
          m.show();
          n.hide();
          p.hide();
          break;
        case "wordsState":
          a.hide();
          c.hide();
          m.hide();
          n.show();
          p.show();
          break;
        case "dictionaryState":
          a.show(),
            c.show(),
            d.hide(),
            f.hide(),
            g.show(),
            l.show(),
            k.show(),
            m.show(),
            n.hide(),
            p.hide();
      }
    },
    clearWordList: function () {
      this.getContentElement("dictionaries", "itemList").removeAllChild();
    },
    getUserDictionary: function () {
      var b = this,
        a = c.scayt;
      a.getUserDictionary(a.getUserDictionaryName(), function (a) {
        a.error || g.renderItemList.call(b, a.wordlist);
      });
    },
    renderItemList: function (b) {
      for (
        var a = this.getContentElement("dictionaries", "itemList"), c = 0;
        c < b.length;
        c++
      )
        a.addChild(b[c]);
    },
    contents: (function (b, a) {
      var c = [],
        d = a.config.scayt_uiTabs;
      if (d) {
        for (var f in d) 1 == d[f] && c.push(b[f]);
        c.push(b[b.length - 1]);
      } else return b;
      return c;
    })(k, c),
  };
  return g;
});
CKEDITOR.tools.extend(CKEDITOR.ui.dialog, {
  scaytItemList: function (c, d, k) {
    if (arguments.length) {
      var n = this;
      c.on("load", function () {
        n.getElement().on("click", function (c) {});
      });
      CKEDITOR.ui.dialog.uiElement.call(
        this,
        c,
        d,
        k,
        "",
        null,
        null,
        function () {
          var c = ['\x3cp class\x3d"cke_dialog_ui_', d.type, '"'];
          d.style && c.push('style\x3d"' + d.style + '" ');
          c.push("\x3e");
          c.push("\x3c/p\x3e");
          return c.join("");
        },
      );
    }
  },
});
CKEDITOR.ui.dialog.scaytItemList.prototype = CKEDITOR.tools.extend(
  new CKEDITOR.ui.dialog.uiElement(),
  {
    children: [],
    blocked: !1,
    addChild: function (c, d) {
      var k = new CKEDITOR.dom.element("p"),
        n = new CKEDITOR.dom.element("a"),
        l = this.getElement().getChildren().getItem(0);
      this.children.push(c);
      k.addClass("cke_scaytItemList-child");
      k.setAttribute("data-cke-scayt-ud-word", c);
      k.appendText(c);
      n.addClass("cke_scaytItemList_remove");
      n.addClass("cke_dialog_close_button");
      n.setAttribute("href", "javascript:void(0)");
      k.append(n);
      l.append(k, d ? !0 : !1);
    },
    inChildren: function (c) {
      return SCAYT.prototype.Utils.inArray(this.children, c);
    },
    removeChild: function (c, d) {
      this.children.splice(SCAYT.prototype.Utils.indexOf(this.children, d), 1);
      this.getElement().getChildren().getItem(0).$.removeChild(c);
    },
    removeAllChild: function () {
      this.children = [];
      this.getElement().getChildren().getItem(0).setHtml("");
    },
    block: function () {
      this.blocked = !0;
    },
    unblock: function () {
      this.blocked = !1;
    },
    isBlocked: function () {
      return this.blocked;
    },
  },
);
(function () {
  commonBuilder = {
    build: function (c, d, k) {
      return new CKEDITOR.ui.dialog[d.type](c, d, k);
    },
  };
  CKEDITOR.dialog.addUIElement("scaytItemList", commonBuilder);
})();
