const menu=document.getElementById('menu'),links=document.getElementById('links');menu.addEventListener('click',()=>links.classList.toggle('open'));links.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>links.classList.remove('open')));
document.querySelectorAll('.tab').forEach(t=>t.addEventListener('click',()=>{document.querySelectorAll('.tab').forEach(x=>x.classList.remove('active'));t.classList.add('active');document.getElementById('kind').value=t.dataset.kind}));
document.querySelectorAll('.faq-q').forEach(q=>q.addEventListener('click',()=>q.parentElement.classList.toggle('open')));
const io=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');io.unobserve(e.target)}}),{threshold:.1});document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
document.getElementById('year').textContent=new Date().getFullYear();const topBtn=document.getElementById('toTop');window.addEventListener('scroll',()=>topBtn.classList.toggle('show',scrollY>450));topBtn.addEventListener('click',()=>scrollTo({top:0,behavior:'smooth'}));
function submitToWhatsApp(e){e.preventDefault();const d=Object.fromEntries(new FormData(e.target).entries());let msg=`Assalam o Alaikum Wafa Travel and Tour,%0ATravel Enquiry: ${encodeURIComponent(d.type||'General')}%0AName: ${encodeURIComponent(d.name||'')}%0APhone: ${encodeURIComponent(d.phone||'')}%0AEmail: ${encodeURIComponent(d.email||'')}%0ADestination/Route: ${encodeURIComponent(d.destination||'')}%0ADate: ${encodeURIComponent(d.date||'')}%0ATravellers: ${encodeURIComponent(d.travellers||'')}%0ADetails: ${encodeURIComponent(d.message||'')}`;window.open('https://wa.me/923246627054?text='+msg,'_blank','noopener');}
document.getElementById('quickForm').addEventListener('submit',submitToWhatsApp);document.getElementById('contactForm').addEventListener('submit',submitToWhatsApp);

document.addEventListener('DOMContentLoaded', function(){
  var cf=document.getElementById('contactForm'); if(cf){cf.addEventListener('submit', function(e){
    var d=Object.fromEntries(new FormData(e.target).entries());
    var body='Name: '+(d.name||'')+'%0APhone: '+(d.phone||'')+'%0AEmail: '+(d.email||'')+'%0AType: '+(d.type||'')+'%0ADetails: '+(d.message||'');
    window.location.href='mailto:contact@matchlesstravels.ca?subject='+encodeURIComponent('Travel Enquiry - '+(d.type||'General'))+'&body='+body;
  }, true);} 
  var qf=document.getElementById('quickForm'); if(qf){qf.addEventListener('submit', function(e){e.preventDefault();
    var d=Object.fromEntries(new FormData(e.target).entries());
    var body='Name: '+(d.name||'')+'%0AType: '+(d.type||'')+'%0ADestination/Package: '+(d.destination||'')+'%0ADate: '+(d.date||'')+'%0ATravellers: '+(d.travellers||'');
    window.location.href='mailto:contact@matchlesstravels.ca?subject='+encodeURIComponent('Quick Enquiry - '+(d.type||'General'))+'&body='+body;
  }, true);} 
});
