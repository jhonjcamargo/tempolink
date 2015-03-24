/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function() {

	'use strict';

	var support = { animations : Modernizr.cssanimations },
		animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
		animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ];

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function onEndAnimation( el, callback ) {
		var onEndCallbackFn = function( ev ) {
			if( support.animations ) {
				if( ev.target != this ) return;
				this.removeEventListener( animEndEventName, onEndCallbackFn );
			}
			if( callback && typeof callback === 'function' ) { callback.call(); }
		};

		if( support.animations ) {
			el.addEventListener( animEndEventName, onEndCallbackFn );
		}
		else {
			onEndCallbackFn();
		}
	}

	function centroDimensionar( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );
		this.items = [].slice.call( this.el.children );
		this.itemsCount = this.items.length;
		this.current = this.options.start >= 0 || this.options.start < this.itemsCount ? this.options.start : 0,
		this._setCurrent();
		this._startcentroDimensionar();
	}

	centroDimensionar.prototype.options = {
		start : 0,
		interval : 3500
	}

	centroDimensionar.prototype._startcentroDimensionar = function() {
		if( this.centroDimensionartime ) {
			clearTimeout( this.centroDimensionartime );
		}
		var self = this;
		this.centroDimensionartime = setTimeout( function() {
			self._navigate( 'next' );
			self._startcentroDimensionar();
		}, this.options.interval );
	}

	centroDimensionar.prototype._navigate = function( direction ) {
		var self = this,
			// current item
			oldItem = this.items[ this.current ];
		
		if( direction === 'next' ) {
			this.current = this.current < this.itemsCount - 1 ? ++this.current : 0;
		}
		else {
			this.current = this.current > 0 ? --this.current : this.itemsCount - 1;
		}

		// new item
		var newItem = this.items[ this.current ];
		
		classie.add( oldItem, direction === 'next' ? 'out--next' : 'out--prev' );
		classie.add( newItem, direction === 'next' ? 'in--next' : 'in--prev' );

		onEndAnimation( newItem, function() {
			self._setCurrent( oldItem );
			classie.remove( oldItem, direction === 'next' ? 'out--next' : 'out--prev' );
			classie.remove( newItem, direction === 'next' ? 'in--next' : 'in--prev' );
		} );
	}

	centroDimensionar.prototype._setCurrent = function( old ) {
		if( old ) {
			classie.remove( old, 'current' );
		}
		classie.add( this.items[ this.current], 'current' );
	}

	window.centroDimensionar = centroDimensionar;

})();