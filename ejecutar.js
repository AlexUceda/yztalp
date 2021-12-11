var arr= [].slice.call( 
    document.getElementsByClassName('svg-inline--fa') ); 
    for(var i = 0, a = []; i < arr.length; i++) 
    arr[i].style.display= 'none'; 
    //document.getElementsByClassName('ResultsOverview')[0].innerHTML;
    
    var data={
    "html"             : document.getElementsByClassName('ResultsOverview')[0].innerHTML,
    }
    $.ajax({
        url: "https://localhost:8000/principal",
        type: "POST",
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify(data),
        headers: {
            "holamundo":"holamundo",
        },
        async: false,
        dataType: 'json',
    }).done(function(datos) {
        console.log(datos);      
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown, textStatus );      
    });



    var arr= [].slice.call( 
        document.getElementsByClassName('svg-inline--fa') ); 
        for(var i = 0, a = []; i < arr.length; i++) 
        arr[i].style.display= 'none'; 
        htm = document.getElementsByClassName('ResultsOverview')[0].innerHTML;
        const params={
            "html"             : htm,
        }
    var req = new XMLHttpRequest();
    req.open('POST', 'https://localhost:8000/api/principal', true);
    req.setRequestHeader('Content-type', 'application/json');
    //req.setRequestHeader("Content-length", 1);
    req.send(JSON.stringify(params)); 
    req.onreadystatechange = function (aEvt) {
      if (req.readyState == 4) {
         if(req.status == 200)
          console.log(req.responseText);
         else
          console.log("Error loading page\n");
      }
    };



    var puntaje = document.getElementsByClassName('ExamResults-score-grade')[0].innerText
    var arr= [].slice.call( document.getElementsByClassName('Question-count')); 
    for(var i = 0, a = []; i < arr.length; i++) 
    arr[i].remove(); var arr= [].slice.call( 
    document.getElementsByClassName('Question-button') ); 
    for(var i = 0, a = []; i < arr.length; i++) 
    arr[i].remove();
    var arr= [].slice.call( 
    document.getElementsByClassName('svg-inline--fa') ); 
    for(var i = 0, a = []; i < arr.length; i++) 
    arr[i].style.display= 'none'; 
    htm = document.getElementsByClassName('ResultsOverview')[0].innerHTML;
    const params={
        "html"             : htm,
        "puntaje"          : puntaje
    }
    var req = new XMLHttpRequest();
    req.open('POST', 'https://localhost:8000/api/principal', true);
    //req.setRequestHeader('Content-type', "application/json;charset=UTF-8");
    //req.setRequestHeader("Content-length", 1);
    req.send(JSON.stringify(params)); 
    req.onreadystatechange = function (aEvt) {
      console.log(aEvt);
    };