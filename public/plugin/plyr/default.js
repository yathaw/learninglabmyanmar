// Utilities
        var utils = {
            // Check variable types
            is: {
                object: function(input) {
                    return input !== null && typeof(input) === 'object' && input.constructor === Object;
                },
                array: function(input) {
                    return input !== null && Array.isArray(input);
                },
                number: function(input) {
                    return input !== null && (typeof(input) === 'number' && !isNaN(input - 0) || (typeof input === 'object' && input.constructor === Number));
                },
                string: function(input) {
                    return input !== null && (typeof input === 'string' || (typeof input === 'object' && input.constructor === String));
                },
                boolean: function(input) {
                    return input !== null && typeof input === 'boolean';
                },
                nodeList: function(input) {
                    return input !== null && input instanceof NodeList;
                },
                htmlElement: function(input) {
                    return input !== null && input instanceof HTMLElement;
                },
                function: function(input) {
                    return input !== null && typeof input === 'function';
                },
                event: function(input) {
                    return input !== null && input instanceof Event;
                },
                cue: function(input) {
                    return input !== null && (input instanceof window.TextTrackCue || input instanceof window.VTTCue);
                },
                track: function(input) {
                    return input !== null && input instanceof window.TextTrack;
                },
                undefined: function(input) {
                    return input !== null && typeof input === 'undefined';
                },
                empty: function(input) {
                    return input === null || this.undefined(input) || ((this.string(input) || this.array(input) || this.nodeList(input)) && input.length === 0) || (this.object(input) && Object.keys(input).length === 0);
                }
            },

            // Credits: http://paypal.github.io/accessible-html5-video-player/
            // Unfortunately, due to mixed support, UA sniffing is required
            getBrowser: function() {
                var ua = navigator.userAgent;
                var name = navigator.appName;
                var fullVersion = '' + parseFloat(navigator.appVersion);
                var majorVersion = parseInt(navigator.appVersion, 10);
                var nameOffset;
                var verOffset;
                var ix;
                var isIE = false;
                var isFirefox = false;
                var isChrome = false;
                var isSafari = false;

                if ((navigator.appVersion.indexOf('Windows NT') !== -1) && (navigator.appVersion.indexOf('rv:11') !== -1)) {
                    // MSIE 11
                    isIE = true;
                    name = 'IE';
                    fullVersion = '11';
                } else if ((verOffset = ua.indexOf('MSIE')) !== -1) {
                    // MSIE
                    isIE = true;
                    name = 'IE';
                    fullVersion = ua.substring(verOffset + 5);
                } else if ((verOffset = ua.indexOf('Chrome')) !== -1) {
                    // Chrome
                    isChrome = true;
                    name = 'Chrome';
                    fullVersion = ua.substring(verOffset + 7);
                } else if ((verOffset = ua.indexOf('Safari')) !== -1) {
                    // Safari
                    isSafari = true;
                    name = 'Safari';
                    fullVersion = ua.substring(verOffset + 7);

                    if ((verOffset = ua.indexOf('Version')) !== -1) {
                        fullVersion = ua.substring(verOffset + 8);
                    }
                } else if ((verOffset = ua.indexOf('Firefox')) !== -1) {
                    // Firefox
                    isFirefox = true;
                    name = 'Firefox';
                    fullVersion = ua.substring(verOffset + 8);
                } else if ((nameOffset = ua.lastIndexOf(' ') + 1) < (verOffset = ua.lastIndexOf('/'))) {
                    // In most other browsers, 'name/version' is at the end of userAgent
                    name = ua.substring(nameOffset, verOffset);
                    fullVersion = ua.substring(verOffset + 1);

                    if (name.toLowerCase() === name.toUpperCase()) {
                        name = navigator.appName;
                    }
                }

                // Trim the fullVersion string at semicolon/space if present
                if ((ix = fullVersion.indexOf(';')) !== -1) {
                    fullVersion = fullVersion.substring(0, ix);
                }
                if ((ix = fullVersion.indexOf(' ')) !== -1) {
                    fullVersion = fullVersion.substring(0, ix);
                }

                // Get major version
                majorVersion = parseInt('' + fullVersion, 10);
                if (isNaN(majorVersion)) {
                    fullVersion = '' + parseFloat(navigator.appVersion);
                    majorVersion = parseInt(navigator.appVersion, 10);
                }

                // Return data
                return {
                    name: name,
                    version: majorVersion,
                    isIE: isIE,
                    isOldIE: (isIE && majorVersion <= 9),
                    isFirefox: isFirefox,
                    isChrome: isChrome,
                    isSafari: isSafari,
                    isIPhone: /(iPhone|iPod)/gi.test(navigator.platform),
                    isIos: /(iPad|iPhone|iPod)/gi.test(navigator.platform)
                };
            },

            // Check for support
            // Basic functionality vs full UI
            checkSupport: function(type, inline) {
                var basic = false;
                var full = false;
                var browser = utils.getBrowser();
                var playsInline = (browser.isIPhone && inline && support.inline);

                switch (type) {
                    case 'video':
                        basic = support.video;
                        full = basic && !browser.isOldIE && (!browser.isIPhone || playsInline);
                        break;

                    case 'audio':
                        basic = support.audio;
                        full = basic && !browser.isOldIE;
                        break;

                    case 'youtube':
                        basic = support.video;
                        full = basic && !browser.isOldIE && (!browser.isIPhone || playsInline);
                        break;

                    case 'vimeo':
                    case 'soundcloud':
                        basic = true;
                        full = (!browser.isOldIE && !browser.isIos);
                        break;

                    default:
                        basic = (support.audio && support.video);
                        full = (basic && !browser.isOldIE);
                }

                return {
                    basic: basic,
                    full: full
                };
            },

            // Inject a script
            injectScript: function(url) {
                // Check script is not already referenced
                if (document.querySelectorAll('script[src="' + url + '"]').length) {
                    return;
                }

                var tag = document.createElement('script');
                tag.src = url;

                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            },

            // Determine if we're in an iframe
            inFrame: function() {
                try {
                    return window.self !== window.top;
                } catch (e) {
                    return true;
                }
            },

            // Element exists in an array
            inArray: function(haystack, needle) {
                return utils.is.array(haystack) && haystack.indexOf(needle) !== -1;
            },

            // Replace all
            replaceAll: function(string, find, replace) {
                return string.replace(new RegExp(find.replace(/([.*+?\^=!:${}()|\[\]\/\\])/g, '\\$1'), 'g'), replace);
            },

            // Wrap an element
            wrap: function(elements, wrapper) {
                // Convert `elements` to an array, if necessary.
                if (!elements.length) {
                    elements = [elements];
                }

                // Loops backwards to prevent having to clone the wrapper on the
                // first element (see `child` below).
                for (var i = elements.length - 1; i >= 0; i--) {
                    var child = (i > 0) ? wrapper.cloneNode(true) : wrapper;
                    var element = elements[i];

                    // Cache the current parent and sibling.
                    var parent = element.parentNode;
                    var sibling = element.nextSibling;

                    // Wrap the element (is automatically removed from its current
                    // parent).
                    child.appendChild(element);

                    // If the element had a sibling, insert the wrapper before
                    // the sibling to maintain the HTML structure; otherwise, just
                    // append it to the parent.
                    if (sibling) {
                        parent.insertBefore(child, sibling);
                    } else {
                        parent.appendChild(child);
                    }

                    return child;
                }
            },

            // Remove an element
            removeElement: function(element) {
                if (!utils.is.htmlElement(element) ||
                    !utils.is.htmlElement(element.parentNode)) {
                    return;
                }

                element.parentNode.removeChild(element);
            },

            // Prepend child
            prependChild: function(parent, element) {
                parent.insertBefore(element, parent.firstChild);
            },

            // Inaert an element after another
            insertAfter: function(element, target) {
                target.parentNode.insertBefore(element, target.nextSibling);
            },

            // Create a DocumentFragment
            createElement: function(type, attributes, text) {
                // Create a new <element>
                var element = document.createElement(type);

                // Set all passed attributes
                if (utils.is.object(attributes)) {
                    utils.setAttributes(element, attributes);
                }

                // Add text node
                if (utils.is.string(text)) {
                    element.textContent = text;
                }

                // Return built element
                return element;
            },

            // Insert a DocumentFragment
            insertElement: function(type, parent, attributes, text) {
                // Create a new <element>
                var element = utils.createElement(type, attributes, text);

                // Inject the new element
                utils.prependChild(parent, element);
            },

            // Remove all child elements
            emptyElement: function(element) {
                var length = element.childNodes.length;
                while (length--) {
                    element.removeChild(element.lastChild);
                }
            },

            // Set attributes
            setAttributes: function(element, attributes) {
                for (var key in attributes) {
                    element.setAttribute(key, attributes[key]);
                }
            },

            // Get an attribute object from a string selector
            getAttributesFromSelector: function(selector, existingAttributes) {
                // For example:
                // '.test' to { class: 'test' }
                // '#test' to { id: 'test' }
                // '[data-test="test"]' to { 'data-test': 'test' }

                if (!utils.is.string(selector) || utils.is.empty(selector)) {
                    return {};
                }

                var attributes = {};

                selector.split(',').forEach(function(selector) {
                    // Remove whitespace
                    selector = selector.trim();

                    // Get the first character
                    var start = selector.charAt(0);

                    switch (start) {
                        case '.':
                            // Classname selector
                            var className = selector.replace('.', '');

                            // Add to existing classname
                            if (utils.is.object(existingAttributes) && utils.is.string(existingAttributes.class)) {
                                existingAttributes.class += ' ' + className;
                            }

                            attributes.class = className;
                            break;

                        case '#':
                            // ID selector
                            attributes.id = selector.replace('#', '');
                            break;

                        case '[':
                            // Strip the []
                            selector = selector.replace(/[\[\]]/g, '');

                            // Get the parts if
                            var parts = selector.split('=');
                            var key = parts[0];

                            // Get the value if provided
                            var value = parts.length > 1 ? parts[1].replace(/[\"\']/g, '') : '';

                            // Attribute selector
                            attributes[key] = value;

                            break;
                    }
                });

                return attributes;
            },

            // Toggle class on an element
            toggleClass: function(element, className, state) {
                if (element) {
                    if (element.classList) {
                        element.classList[state ? 'add' : 'remove'](className);
                    } else {
                        var name = (' ' + element.className + ' ').replace(/\s+/g, ' ').replace(' ' + className + ' ', '');
                        element.className = name + (state ? ' ' + className : '');
                    }
                }
            },

            // Has class name
            hasClass: function(element, className) {
                if (element) {
                    if (element.classList) {
                        return element.classList.contains(className);
                    } else {
                        return new RegExp('(\\s|^)' + className + '(\\s|$)').test(element.className);
                    }
                }
                return false;
            },

            // Element matches selector
            matches: function(element, selector) {
                var prototype = Element.prototype;

                var matches = prototype.matches ||
                    prototype.webkitMatchesSelector ||
                    prototype.mozMatchesSelector ||
                    prototype.msMatchesSelector ||
                    function(selector) {
                        return [].indexOf.call(document.querySelectorAll(selector), this) !== -1;
                    };

                return matches.call(element, selector);
            },

            // Get the focused element
            getFocusElement: function() {
                var focused = document.activeElement;

                if (!focused || focused === document.body) {
                    focused = null;
                } else {
                    focused = document.querySelector(':focus');
                }

                return focused;
            },

            // Bind along with custom handler
            proxy: function(element, eventName, customListener, defaultListener, passive, capture) {
                utils.on(element, eventName, function(event) {
                    if (customListener) {
                        customListener.apply(element, [event]);
                    }
                    defaultListener.apply(element, [event]);
                }, passive, capture);
            },

            // Toggle event listener
            toggleListener: function(elements, events, callback, toggle, passive, capture) {
                // Bail if no elements
                if (elements === null || utils.is.undefined(elements)) {
                    return;
                }

                // Allow multiple events
                events = events.split(' ');

                // Whether the listener is a capturing listener or not
                // Default to false
                if (!utils.is.boolean(capture)) {
                    capture = false;
                }

                // Whether the listener can be passive (i.e. default never prevented)
                // Default to true
                if (!utils.is.boolean(passive)) {
                    passive = true;
                }

                // If a nodelist is passed, call itself on each node
                if (elements instanceof NodeList) {
                    // Convert arguments to Array
                    // https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Functions/arguments
                    var args = arguments.length === 1 ? [arguments[0]] : Array.apply(null, arguments);

                    // Remove the first argument (elements) as we replace it
                    args.shift();

                    // Create listener for each node
                    [].forEach.call(elements, function(element) {
                        if (element instanceof Node) {
                            utils.toggleListener.apply(null, [element].concat(args));
                        }
                    });

                    return;
                }

                // Build options
                // Default to just capture boolean
                var options = capture;

                // If passive events listeners are supported
                if (support.passiveListeners) {
                    options = {
                        passive: passive,
                        capture: capture
                    };
                }

                // If a single node is passed, bind the event listener
                events.forEach(function(event) {
                    elements[toggle ? 'addEventListener' : 'removeEventListener'](event, callback, options);
                });
            },

            // Bind event handler
            on: function(element, events, callback, passive, capture) {
                utils.toggleListener(element, events, callback, true, passive, capture);
            },

            // Unbind event handler
            off: function(element, events, callback, passive, capture) {
                utils.toggleListener(element, events, callback, false, passive, capture);
            },

            // Trigger event
            event: function(element, type, bubbles, properties) {
                // Bail if no element
                if (!element || !type) {
                    return;
                }

                // Default bubbles to false
                if (!utils.is.boolean(bubbles)) {
                    bubbles = false;
                }

                // Create CustomEvent constructor
                var CustomEvent;
                if (utils.is.function(window.CustomEvent)) {
                    CustomEvent = window.CustomEvent;
                } else {
                    // Polyfill CustomEvent
                    // https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent/CustomEvent#Polyfill
                    CustomEvent = function(event, params) {
                        params = params || {
                            bubbles: false,
                            cancelable: false,
                            detail: undefined
                        };
                        var custom = document.createEvent('CustomEvent');
                        custom.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
                        return custom;
                    };
                    CustomEvent.prototype = window.Event.prototype;
                }

                // Create and dispatch the event
                var event = new CustomEvent(type, {
                    bubbles: bubbles,
                    detail: properties
                });

                // Dispatch the event
                element.dispatchEvent(event);
            },

            // Toggle aria-pressed state on a toggle button
            // http://www.ssbbartgroup.com/blog/how-not-to-misuse-aria-states-properties-and-roles
            toggleState: function(target, state) {
                // Bail if no target
                if (!target) {
                    return;
                }

                // Get state
                state = (utils.is.boolean(state) ? state : !target.getAttribute('aria-pressed'));

                // Set the attribute on target
                target.setAttribute('aria-pressed', state);

                return state;
            },

            // Get percentage
            getPercentage: function(current, max) {
                if (current === 0 || max === 0 || isNaN(current) || isNaN(max)) {
                    return 0;
                }
                return ((current / max) * 100).toFixed(2);
            },

            // Deep extend/merge destination object with N more objects
            // http://andrewdupont.net/2009/08/28/deep-extending-objects-in-javascript/
            // Removed call to arguments.callee (used explicit function name instead)
            extend: function() {
                // Get arguments
                var objects = arguments;

                // Bail if nothing to merge
                if (!objects.length) {
                    return;
                }

                // Return first if specified but nothing to merge
                if (objects.length === 1) {
                    return objects[0];
                }

                // First object is the destination
                var destination = Array.prototype.shift.call(objects);
                if (!utils.is.object(destination)) {
                    destination = {};
                }

                var length = objects.length;

                // Loop through all objects to merge
                for (var i = 0; i < length; i++) {
                    var source = objects[i];

                    if (!utils.is.object(source)) {
                        source = {};
                    }

                    for (var property in source) {
                        if (source[property] && source[property].constructor && source[property].constructor === Object) {
                            destination[property] = destination[property] || {};
                            utils.extend(destination[property], source[property]);
                        } else {
                            destination[property] = source[property];
                        }
                    }
                }

                return destination;
            },

            // Parse YouTube ID from url
            parseYouTubeId: function(url) {
                var regex = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                return url.match(regex) ? RegExp.$2 : url;
            },

            // Remove HTML from a string
            stripHTML: function(source) {
                var fragment = document.createDocumentFragment();
                var element = document.createElement('div');
                fragment.appendChild(element);
                element.innerHTML = source;
                return fragment.firstChild.innerText;
            },

            // Load an SVG sprite
            loadSprite: function(url, id) {
                if (typeof url !== 'string') {
                    return;
                }

                var prefix = 'cache-';
                var hasId = typeof id === 'string';
                var isCached = false;

                function updateSprite(container, data) {
                    // Inject content
                    container.innerHTML = data;

                    // Inject the SVG to the body
                    document.body.insertBefore(container, document.body.childNodes[0]);
                }

                // Only load once
                if (!hasId || !document.querySelectorAll('#' + id).length) {
                    // Create container
                    var container = document.createElement('div');
                    container.setAttribute('hidden', '');

                    if (hasId) {
                        container.setAttribute('id', id);
                    }

                    // Check in cache
                    if (support.storage) {
                        var cached = window.localStorage.getItem(prefix + id);
                        isCached = cached !== null;

                        if (isCached) {
                            var data = JSON.parse(cached);
                            updateSprite(container, data.content);
                        }
                    }

                    // ReSharper disable once InconsistentNaming
                    var xhr = new XMLHttpRequest();

                    // XHR for Chrome/Firefox/Opera/Safari
                    if ('withCredentials' in xhr) {
                        xhr.open('GET', url, true);
                    } else {
                        return;
                    }

                    // Once loaded, inject to container and body
                    xhr.onload = function() {
                        if (support.storage) {
                            window.localStorage.setItem(prefix + id, JSON.stringify({
                                content: xhr.responseText
                            }));
                        }

                        updateSprite(container, xhr.responseText);
                    };

                    xhr.send();
                }
            },

            // Get the transition end event
            transitionEnd: (function() {
                var element = document.createElement('span');

                var events = {
                    WebkitTransition: 'webkitTransitionEnd',
                    MozTransition: 'transitionend',
                    OTransition: 'oTransitionEnd otransitionend',
                    transition: 'transitionend'
                }

                for (var type in events) {
                    if (element.style[type] !== undefined) {
                        return events[type];
                    }
                }

                return false;
            })()
        };