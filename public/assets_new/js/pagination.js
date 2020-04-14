function paging(data,perPage,searchKeyWord,currentPage,pageSelected,searchFilter){
  // var perPage = 10;
  var rowCount = data.length;
  var pageCount = rowCount / perPage;
  pageCount = Math.ceil(pageCount);
  var perCurrent = 7;
  var lastCurrent = pageCount - perCurrent;

  awal = (pageSelected * perPage) - perPage;
  akhir = awal+perPage;
  if(akhir > rowCount){ akhir = rowCount; }
  if(perCurrent > pageCount){ perCurrent=pageCount;lastCurrent=pageCount; }
  if(pageCount > 0){
    if(currentPage == 1){ classAdd=' disabled'; }else{ classAdd=''; }
    pagination = `
      <ul class="pagination center">
        <li class="waves-effect `+classAdd+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',1,'`+searchFilter+`');"><i class="material-icons">skip_previous</i></a></li>
        <li class="waves-effect `+classAdd+`"><a href="javascript:;" onclick="getdata('',`+(currentPage-1)+`,'`+searchFilter+`');"><i class="material-icons">chevron_left</i></a></li>
    `;
    if(currentPage < perCurrent){
      for(var i=1; i <= perCurrent; i++){
        if(i == currentPage){ activeClass=" active"; }else{ activeClass=""; }
        pagination += `<li class="waves-effect`+activeClass+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',`+i+`,'`+searchFilter+`');">`+i+`</a></li>`;
      }
    } else if(currentPage > lastCurrent){
      for(var i=lastCurrent; i <= pageCount; i++){
        if(i == currentPage){ activeClass=" active"; }else{ activeClass=""; }
        pagination += `<li class="waves-effect`+activeClass+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',`+i+`,'`+searchFilter+`');">`+i+`</a></li>`;
      }
    } else {
      currentAwal = currentPage - 3;
      currentAkhir = currentPage + 3;
      if(perCurrent >= pageCount){
        currentAwal=1;
        currentAkhir=pageCount;
      }
      for(var i=currentAwal; i <= currentAkhir; i++){
        if(i == currentPage){ activeClass=" active"; }else{ activeClass=""; }
        pagination += `<li class="waves-effect`+activeClass+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',`+i+`,'`+searchFilter+`');">`+i+`</a></li>`;
      }
    }
    if(currentPage == pageCount){ classAdd=' disabled'; }else{ classAdd=''; }
    pagination += `
        <li class="waves-effect `+classAdd+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',`+(currentPage+1)+`,'`+searchKeyWord+`');"><i class="material-icons">chevron_right</i></a></li>
        <li class="waves-effect `+classAdd+`"><a href="javascript:;" onclick="getdata('`+searchKeyWord+`',`+pageCount+`,'`+searchKeyWord+`');"><i class="material-icons">skip_next</i></a></li>
      </ul>
    `;
  }
  $('#pagination').html(pagination);
  return awal+'|'+akhir+'|'+pageCount;
}
