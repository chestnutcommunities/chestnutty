/*
 Shingo Tamura Library
 Author: Shingo Tamura
 Author URI: http://www.chestnutsoftwarestudios.com
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 */
/*global jQuery */
var stlib = stlib ||
(function() {
    "use strict";
    var mvc = (function() {
        function model() {
            var instance = {}, observers = [], dataStorage = {};
            
            function register(observer) {
                observers[observers.length] = observer;
            }
            function notify(msg, args) {
                var index = 0, length = observers.length;
                // sends a notification to all observers
                for (; index < length; index += 1) {
                    if (typeof observers[index].notified !== "undefined") {
                        observers[index].notified(msg, args);
                    }
                }
            }
            function extend(key, val) {
                var property, filled = false;
                for (property in instance) {
                    if (instance.hasOwnProperty(property)) {
                        if (property === key) {
                            instance[property] = val;
                            filled = true;
                        }
                    }
                }
                if (!filled) {
                    instance[key] = val;
                }
            }
            function getProperty(propertyPath) {
                var nestedProperties = propertyPath.split(".");
                function resolve(obj, index, propertyArray) {
                    if ((index + 1) === propertyArray.length) {
                        return obj[propertyArray[index]];
                    }
                    else {
                        return resolve(obj[propertyArray[index]], (index + 1), nestedProperties);
                    }
                }
                return resolve(dataStorage, 0, nestedProperties);
            }
            function setProperty(propertyPath, val) {
                // assigns the given value to the matched property of the monitored object
                var nestedProperties = propertyPath.split(".");
                function resolve(obj, index, propertyArray) {
                    if ((index + 1) === propertyArray.length) {
                        if (obj[propertyArray[index]] !== val) {
                            obj[propertyArray[index]] = val;
                            return true;
                        }
                        else {
                            return false;
                        }
                    }
                    else {
                        return resolve(obj[propertyArray[index]], (index + 1), nestedProperties);
                    }
                }
                return resolve(dataStorage, 0, nestedProperties);
            }
            function data(path, val) {
                if (typeof val === "undefined") {
                    return getProperty(path);
                }
                else {
                    setProperty(path, val);
                }
            }
            instance = {
                register: register,
                extend: extend,
                notify: notify,
                data: data
            };
            return instance;
        }
        function view(model) {
            var instance = {}, notifications = {};
            
            instance.extend = function(key, val) {
                var property, filled = false;
                for (property in instance) {
                    if (instance.hasOwnProperty(property)) {
                        if (property === key) {
                            instance[property] = val;
                            filled = true;
                        }
                    }
                }
                if (!filled) {
                    instance[key] = val;
                }
            };
            instance.capture = function(msg, handler) {
                var item, filled = false;
                
                function method(args) {
                    handler(args);
                }
                
                for (item in notifications) {
                    if (notifications.hasOwnProperty(item)) {
                        if (item === msg) {
                            notifications[item] = method;
                            filled = true;
                        }
                    }
                }
                if (!filled) {
                    notifications[msg] = method;
                }
            };
            instance.notified = function(msg, args) {
                var item;
                for (item in notifications) {
                    if (notifications.hasOwnProperty(item)) {
                        if (item === msg) {
                            notifications[item](args);
                        }
                    }
                }
            };
            
            model.register(instance);
            
            return instance;
        }
        
        return {
            model: model,
            view: view
        };
    }()), ui = {
        messagebox: function(type, title, message, actions) {
            var content = stlib.stringBuilder(), action, className, popup;
            
            content.appendLine("<div class=\"jqmWindow\">");
            content.appendFormat("<div class=\"head\"><h3>{0}</h3><input type=\"button\" class=\"close\" /><div class=\"clear\"><!----></div></div>", title);
            content.appendLine("", "<div class=\"content\">");
            content.appendFormat("<div class=\"message-type {0}\"><span class=\"icon\"> </span></div>", type.toLowerCase());
            content.appendFormat("<div class=\"message-content\">{0}</div>", message);
            
            content.appendLine("", "<div class=\"message-action\"><ul>");
            for (action in actions) {
                if (actions.hasOwnProperty(action)) {
                    className = action.toLowerCase().replace(/\s/g, "-");
                    content.appendFormat("<li><a href=\"\" class=\"{0}\"><span>{1}</span></a></li>", className, action);
                    content.appendLine();
                }
            }
            content.appendLine("</ul></div></div>");
            
            popup = jQuery(content.toString());
            jQuery("body").append(popup);
            
            popup.jqm();
            popup.jqm({
                modal: true,
                overlay: 20
            });
            popup.showme = function() {
                //If there is an existing popup being shown, make sure this one has a higher z-index;
                var zindex = 1;
                jQuery(".jqmWindow:visible").each(function() {
                    if (jQuery(this).css("zIndex") > zindex) {
                        zindex = jQuery(this).css("zIndex") + 2;
                    }
                });
                if (zindex > 1) {
                    this.css("zIndex", zindex);
                }
                
                this.jqmShow();
            };
            
            popup.deleteme = function() {
                this.jqmHide();
                this.remove();
            };
            
            popup.hideme = function() {
                this.jqmHide();
            };
            
            function createClickHandler(box, action) {
                return function(e) {
                    action(e, box);
                };
            }
            
            for (action in actions) {
                if (actions.hasOwnProperty(action)) {
                    className = action.toLowerCase().replace(/\s/g, "-");
                    popup.find("div.message-action a." + className).click(createClickHandler(popup, actions[action]));
                }
            }
            popup.find("div.head input.close").click(function() {
                popup.deleteme();
            });
            
            popup.showme();
        },
        resizeContentPane: function() {
            // outerHeight includes padding
            var header = jQuery("#header").outerHeight(true), nav = jQuery("#nav").outerHeight(true), action = jQuery("#body > div.action").outerHeight(true), h1 = jQuery("#home h1").outerHeight(true), h2 = jQuery("#home h2").outerHeight(true), top;
            
            if (header === null) {
                header = 0;
            }
            if (nav === null) {
                nav = 0;
            }
            if (action === null) {
                action = 0;
            }
            if (h1 === null) {
                h1 = 0;
            }
            if (h2 === null) {
                h2 = 0;
            }
            top = header + nav + action + h1 + h2;
            jQuery("table.content div.wrapper").css({
                "height": (jQuery(window).height() - top) + "px"
            });
        }
    }, utility = (function() {
        var getCopiable;
        function isArray(value) {
            return Object.prototype.toString.apply(value) === "[object Array]";
        }
        function convertToArray(value) {
            var tmp = [];
            if (isArray(value) === false) {
                tmp[0] = value;
                value = tmp;
            }
            return value;
        }
        function swap(arr, posA, posB) {
            var tmp = arr[posA];
            arr[posA] = arr[posB];
            arr[posB] = tmp;
        }
        function makeCopy(source) {
            var c, index = 0, length = 0, prop;
            if (isArray(source) === true) {
                c = [];
                for (length = source.length; index < length; index += 1) {
                    c[index] = getCopiable(source[index]);
                }
            }
            else {
                c = {};
                for (prop in source) {
                    if (source.hasOwnProperty(prop)) {
                        c[prop] = getCopiable(source[prop]);
                    }
                }
            }
            return c;
        }
        getCopiable = function(source) {
            if (typeof source === "object" && source !== null) {
                return makeCopy(source);
            }
            else {
                return source;
            }
        };
        return {
            convertToArray: convertToArray,
            swap: swap,
            makeCopy: makeCopy,
            isArray: isArray
        };
    }());
    function stringBuilder() {
        var content = [];
        function append() {
            var index = 0, args = arguments, length = 0;
            if (typeof args === "undefined") {
                return;
            }
            for (length = args.length; index < length; index += 1) {
                content[content.length] = args[index].toString();
            }
        }
        function appendLine() {
            var index = 0, args = arguments, length = 0;
            if (typeof args === "undefined") {
                content[content.length] = "\n";
                return;
            }
            for (length = args.length; index < length; index += 1) {
                content[content.length] = args[index].toString() + "\n";
            }
        }
        function appendFormat() {
            var index = 1, length, args = arguments, textFormat;
            if (typeof args === "undefined") {
                return;
            }
            textFormat = args[0];
            for (length = args.length; index < length; index += 1) {
                textFormat = textFormat.replace(new RegExp("\\{" + (index - 1) + "\\}", "g"), args[index]);
            }
            content[content.length] = textFormat;
        }
        function toString() {
            return content.join('');
        }
        return {
            append: append,
            appendLine: appendLine,
            appendFormat: appendFormat,
            toString: toString
        };
    }
    function namespace(ns) {
        var parts = ns.split("."), parent = stlib, index = 0, length = parts.length;
        
        if (parts[0] === "stlib") {
            parts = parts.slice(1);
        }
        
        for (; index < length; index += 1) {
            if (typeof parent[parts[index]] === "undefined") {
                parent[parts[index]] = {};
            }
            parent = parent[parts[index]];
        }
        
        return parent;
        
    }
    
    return {
        namespace: namespace,
        stringBuilder: stringBuilder,
        utility: utility,
        ui: ui,
        mvc: mvc
    };
}());
