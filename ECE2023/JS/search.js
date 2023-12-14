let search = document.getElementById('search');
let containerAccountsSearch = document.getElementById('containerAccountsSearch');

search.addEventListener('keyup', (event) =>{
    document.querySelector('.containerAccountsSearch').innerHTML = '';

    let text_search = search.value;
    if(text_search == '' || text_search.trim().length === 0){
      containerAccountsSearch.style.opacity="0";
    containerAccountsSearch.style.zIndex="-1";
    }else{
      containerAccountsSearch.style.opacity="1";
      containerAccountsSearch.style.zIndex="1";
    }

    
    $.ajax({
        
        type: 'post',
        url: 'index.php?action=searchAccount',
        data: {
          text_search:text_search
        },
        success: function(response){
            $(".containerAccountsSearch").html(response);
            }

        });
        return false;

})

