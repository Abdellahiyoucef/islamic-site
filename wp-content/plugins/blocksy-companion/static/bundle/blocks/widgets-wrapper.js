!function(){"use strict";var e=window.wp.element,t=window.wp.i18n,l=window.wp.blocks,c=window.wp.blockEditor;function n(e,t,l){return t in e?Object.defineProperty(e,t,{value:l,enumerable:!0,configurable:!0,writable:!0}):e[t]=l,e}function r(e,t){if(null==e)return{};var l,c,n=function(e,t){if(null==e)return{};var l,c,n={},r=Object.keys(e);for(c=0;c<r.length;c++)l=r[c],t.indexOf(l)>=0||(n[l]=e[l]);return n}(e,t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);for(c=0;c<r.length;c++)l=r[c],t.indexOf(l)>=0||Object.prototype.propertyIsEnumerable.call(e,l)&&(n[l]=e[l])}return n}var o=window.wp.components;function a(e,t){var l=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),l.push.apply(l,c)}return l}function i(e){for(var t=1;t<arguments.length;t++){var l=null!=arguments[t]?arguments[t]:{};t%2?a(Object(l),!0).forEach((function(t){n(e,t,l[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(l)):a(Object(l)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(l,t))}))}return e}var s=function(l){var n=l.attributes,a=l.setAttributes,s=l.clientId,p=(r(l,["attributes","setAttributes","clientId"]),!window.location.pathname.includes("widgets.php")&&!window.location.pathname.includes("customize.php")),d=wp.data.select("core/block-editor").getBlock(s),u="blocksy/woocommerce-filters"===n.block&&d.innerBlocks&&d.innerBlocks.length>1&&"core/heading"===d.innerBlocks[0].name,b=[["core/heading",{level:3,content:n.heading||"",fontSize:"medium",className:p?"":"widget-title"}]],w=["core/heading"];d.innerBlocks.find((function(e){return"core/heading"===e.name}))&&(w=[]),n.hasDescription&&(b.push(["core/paragraph",{content:n.description,placeholder:"Description"}]),w.push("core/paragraph")),b.push([n.block,i({lock:{remove:!0}},n.blockAttrs)]);var f=(0,c.useBlockProps)({className:{"wp-block-blocksy-widgets-wrapper--collapsible":n.isCollapsible,"wp-block-blocksy-widgets-wrapper--expanded":n.defaultExpanded}});return(0,e.createElement)(React.Fragment,null,u?(0,e.createElement)(c.InspectorControls,null,(0,e.createElement)(o.PanelBody,null,(0,e.createElement)(o.ToggleControl,{label:(0,t.__)("Expandable Container","blocksy"),checked:n.isCollapsible,onChange:function(){return a({isCollapsible:!n.isCollapsible})}}),n.isCollapsible?(0,e.createElement)(o.ToggleControl,{label:(0,t.__)("Expanded by Default","blocksy"),checked:n.defaultExpanded,onChange:function(){return a({defaultExpanded:!n.defaultExpanded})}}):null)):null,(0,e.createElement)("div",f,(0,e.createElement)(c.InnerBlocks,{allowedBlocks:w,template:b})))};(0,window.wp.hooks.addFilter)("blockEditor.__unstableCanInsertBlockType","blocksy/widgets-wrapper",(function(e,t,l,c){var n=c.getBlock;if(0!==t.name.indexOf("blocksy/"))return e;if(!t.parent||!t.parent.includes("blocksy/widgets-wrapper"))return e;var r=n(l);return(!r||"blocksy/widgets-wrapper"!==r.name)&&e}),500),(0,l.registerBlockType)("blocksy/widgets-wrapper",{apiVersion:3,title:(0,t.__)("Widgets Wrapper","blocksy"),icon:{src:(0,e.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",className:"wc-block-editor-components-block-icon"},(0,e.createElement)("path",{d:"M20 14.6c-.2-.3-.5-.6-.9-.8.1-1.2-.1-2.4-.6-3.5s-1.3-2.1-2.3-2.9c-.4-.3-.8-.5-1.3-.8 0-.6-.2-1.2-.5-1.6-.3-.5-.8-.9-1.4-1.1-1-.4-2.4-.1-3.2.8-.5.5-.8 1.2-.8 2-1 .4-1.8 1-2.5 1.8-.8 1-1.4 2.1-1.6 3.3-.1.6-.1 1.3-.1 2-.7.4-1.2 1-1.4 1.7-.3 1.2.1 2.4 1 3.2s2.3.8 3.3.2c.9.6 1.9 1.1 3 1.2.4.1.8.1 1.2.1.9 0 1.9-.2 2.7-.5.5-.2.9-.5 1.4-.8.2.1.4.2.7.3 1.1.3 2.4-.1 3.1-1 .1-.1.2-.3.3-.4v-.1c.7-.9.6-2.2-.1-3.1zm-9.6-8.1c0-.1 0-.2.1-.3 0 0 0-.1.1-.2 0-.1.1-.2.2-.3l.1-.1s.1-.1.1-.2h.1s.1 0 .1-.1c0 0 .1 0 .1-.1h.1c.1 0 .2-.1.3-.1h.7c.1 0 .1 0 .2.1.1 0 .1.1.2.1 0 0 .1 0 .1.1 0 0 .1 0 .1.1l.1.1.2.2v.1l.1.1s0 .1.1.1V7c0 .1 0 .2-.1.3 0 0 0 .1-.1.1 0 0 0 .1-.1.1 0 0-.1.1-.1.2l-.1.1-.1.1h-.1c-.1 0-.1.1-.2.1h-.2c-.1 0-.2.1-.3.1h-1l.1-.1s-.1 0-.1-.1l-.1-.1-.1-.1-.1-.1v-.1l-.1-.1s0-.1-.1-.1v-.1c0-.1-.1-.2-.1-.3V6.6c-.1 0-.1 0-.1-.1zM8 16.6c0 .1-.1.3-.1.4 0 .1-.1.1-.1.2s-.1.1-.1.1l-.1.1-.3.3-.1.1H7v.1c-.1 0-.2.1-.3.1h-.8c-.1 0-.2 0-.3-.1 0 0-.1 0-.1-.1 0 0-.1 0-.1-.1l-.1-.1h-.1l-.1-.1-.1-.1v-.1c.1-.1 0-.2-.1-.3v-.2c0-.1 0-.2-.1-.2V16.3c0-.1 0-.2.1-.2 0 0 0-.1.1-.2 0-.1.1-.2.1-.2l.1-.1.2-.2.1-.1c.1 0 .1-.1.2-.1h.2c.1 0 .2-.1.3-.1h.6c.1 0 .1 0 .2.1l.3-.2s.1 0 .1.1l.2.2c0 .1.1.1.1.1 0 .1.1.1.1.2v.1c.1.2.2.3.2.5v.4c0-.1 0 0 0 0zm7.1 1.4c-.3.2-.5.3-.8.4h-.1l-.2.1c-.1 0-.3.1-.4.1-.3.1-.5.1-.8.2H11.1l-.2-.1c-.1 0-.3-.1-.4-.1-.3-.1-.5-.2-.8-.3-.1-.1-.2-.1-.3-.2-.1-.1-.3-.1-.4-.2 0 .2 0 .1-.1.1.5-.8.6-1.9.3-2.7-.3-.6-.7-1.1-1.2-1.4-.5-.3-1.1-.5-1.7-.4v-1c0-.3.1-.5.2-.8 0-.1.1-.3.1-.4l.1-.3c.1-.2.2-.5.4-.7.1-.1.1-.2.2-.3l.1-.1.1-.1c.1-.4.3-.6.5-.8l.3-.3.1-.1.1-.1c.2-.1.5-.3.7-.4 0 0 .1 0 .1-.1 0 0 0 .1.1.1.3.5.7.9 1.3 1.2.6.3 1.2.4 1.9.3.9-.1 1.7-.8 2.2-1.6.2.1.4.3.7.5l.2.1c.1.1.2.2.3.2.2.2.4.4.5.6l.1.1s0 .1.1.1c.1.1.2.2.2.3.1.2.3.4.4.7 0 .1.1.1.1.2v.1c0 .1.1.2.1.4.1.3.1.5.2.8v1.3c-.4 0-.8 0-1.1.1-1.2.4-2.1 1.6-2 2.9 0 .6.2 1.1.5 1.6zm1.7-3.3zm2.4 1.8v.2c0 .1 0 .2-.1.3v.1c0 .1 0 .1-.1.1 0 0-.1.1-.1.2l-.2.2-.1.1c-.1.1-.2.1-.3.2h-.1c-.1 0-.2.1-.3.1h-.7c-.1 0-.2-.1-.3-.2h-.1l-.1-.1-.1-.1c-.1-.1-.1-.2-.2-.3v-.2c0-.1-.1-.2-.1-.4v-.4c0-.1 0-.2.1-.3l.1-.2v-.1c0-.1.1-.2.2-.3l.1-.1.1-.1c.1-.1.2-.1.3-.2h.2c.1 0 .2-.1.3-.1H18.7c.1 0 .2.1.3.2l.1.1.2.2c.1.1.1.2.2.3v.2c0 .1.1.2.1.3v.1c-.4 0-.4.1-.4.2z"}))},category:"blocksy-blocks",isHidden:!0,edit:s,save:function(){return(0,e.createElement)(c.InnerBlocks.Content,null)},attributes:{heading:{type:"string",default:(0,t.__)("Socials","blocksy")},block:{type:"string",default:"blocksy/socials"},hasDescription:{type:"boolean",default:!1},description:{type:"string",default:""},blockAttrs:{type:"object",default:{}},isCollapsible:{type:"boolean",default:!1},defaultExpanded:{type:"boolean",default:!0}},supports:{className:!1,spacing:{margin:!0,__experimentalDefaultControls:{margin:!0}}},variations:[]})}();