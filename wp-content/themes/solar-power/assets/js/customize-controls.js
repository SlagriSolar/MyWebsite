( function( api ) {

	// Extends our custom "solar-power" section.
	api.sectionConstructor['solar-power'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );