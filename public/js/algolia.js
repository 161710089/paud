(function () {
	var client = algoliasearch('JPCVAI9ADK', 'ebb4f810e77bff208cdc61d6d6098acb');
var index = client.initIndex('siswa');
//initialize autocomplete on search input (ID selector must match)
autocomplete('#aa-search-input',
{ hint: false }, {
    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
    //value to be displayed in input control after user's suggestion selection
    displayKey: 'nama_lengkap',
    //hash of templates used when rendering dataset
    templates: {
        //'suggestion' templating function used to render a single suggestion
        suggestion: function(suggestion) {
          return '<span>' +
            suggestion._highlightResult.nama_lengkap.value + '</span><span>' +
            suggestion.nik.value + '</span>';
        },
        empty:function(result){
        	return 'Sorry, we did not find any result for "' + result.query + '"';
        }
    }
});
})