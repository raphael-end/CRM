$('#button-search').click( function(){
    const content = $('#search-content').val();
    
    window.location = `admin/pesquisa?pesquisa=${content.replace(/\s/g, '-')}`;
})