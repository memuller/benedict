(function () {
    // create Shortcodes button
    tinymce.create("tinymce.plugins.visionShortcodes", {
        init: function (ed, url) {
            ed.addCommand("visionPopup", function (a, params) {
                var popup = params.identifier;

                // load thickbox
                tb_show("Insert Shortcode", url + "/themelovin_popup.php?popup=" + popup + "&width=" + 800);
            });
        },
        createControl: function (btn, e) {
            if (btn == "vision_button") {
                var a = this;

                btn = e.createSplitButton("vision_button", {
                    title: "Insert Shortcode",
                    image: "http://download.themelovin.com/stuff/shortcode-btn.png",
                    icons: false
                });



                // adds the dropdown to the button
                btn.onRenderMenu.add(function (c, b) {
                    a.addWithPopup(b, "Accordions", "accordions");
                    a.addWithPopup(b, "Buttons", "button");
                    a.addWithPopup(b, "Columns", "columns");
                    a.addWithPopup(b, "Content Boxes", "content-boxes");
                    a.addWithPopup(b, "Dividers", "dividers");
					a.addWithPopup(b, "Email Encoder", "mailto");
					a.addWithPopup(b, "Graph - Circular", "knob");
					a.addWithPopup(b, "Graph - Linear", "bar-graph");
                    a.addWithPopup(b, "Icons", "icons");
                    a.addWithPopup(b, "Icons - Mini", "icons-mono");
                    a.addWithPopup(b, "Notification Boxes", "notifications");
					a.addWithPopup(b, "Pricing Boxes", "pricing-box");
					a.addWithPopup(b, "Social Icons", "social-icons");
                    a.addWithPopup(b, "Tabs", "tabs");
                    a.addWithPopup(b, "Team", "team");
                    a.addWithPopup(b, "Testimonials", "testimonials");
                });

                return btn;
            }

            return null;
        },
        addWithPopup: function (ed, title, id) {
            ed.add({
                title: title,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand("visionPopup", false, {
                        title: title,
                        identifier: id
                    })
                }
            })
        },
        addImmediate: function (ed, title, sc) {
            ed.add({
                title: title,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand("mceInsertContent", false, sc)
                }
            })
        },
        getInfo: function () {
            return {
                longname: 'Themelovin Shortcodes',
                author: 'Themelovin',
                authorurl: 'http://themelovin.com',
                infourl: 'http://themelovin.com/',
                version: "1.0"
            }
        }
    });

    // add visionShortcodes plugin
    tinymce.PluginManager.add("visionShortcodes", tinymce.plugins.visionShortcodes);
})();