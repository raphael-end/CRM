$('#button-search').click( function(){
    const content = $('#search-content').val();
    
    window.location = `admin/pesquisa?pesquisa=${content.replace(/\s/g, '-')}`;
})
$('#button-search2').click( function(){
    const content = $('#search-content2').val();
    
    window.location = `pesquisa?pesquisa=${content.replace(/\s/g, '-')}`;
})