$('#button-search').click( function(){
    const content = $('#search-content').val();
    
    window.location = `pesquisa?pesquisa=${content.replace(/\s/g, '-')}`;
})