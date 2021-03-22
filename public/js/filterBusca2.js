$('#button-search').click( function(){
    const content = $('#search-content').val();
    
    window.location = `pesquisaproduto?pesquisa=${content.replace(/\s/g, '-')}`;
})