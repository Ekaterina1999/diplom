function big_sel_out(id_el){
  document.getElementById(id_el).style.background="#FFFFFF";
    document.getElementById(id_el).style.color="#000000";
}

function big_sel_focus(id_el){
  document.getElementById(id_el).style.background="#119aff";
    document.getElementById(id_el).style.color="#FFFFFF";
}

function big_sel_choice(name_el) {
   // var name_id="#"+name_el;
  var el=document.getElementById(name_el).innerHTML;
  var id_el=name_el.charAt(6);
document.getElementById('otkaz').value=el;
    document.getElementById('otkaz_id').value=id_el;
//alert(id_el+" "+name_el+" "+el);
    document.getElementById('otkaz_basis').style.display="none";
}

function choice_sel_click(){
    var el=document.getElementById('otkaz_basis');
    if (el.style.display=="block"){el.style.display="none";}else{el.style.display="block";}

}