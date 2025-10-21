(function(){
  function fmt(n){ try { return new Intl.NumberFormat(undefined, { style:'currency', currency:'USD' }).format(n); } catch(e){ return '$' + (Math.round(n*100)/100); } }
  document.addEventListener('click', function(e){
    if(e.target && e.target.id === 'ny-calc'){
      var wholesale = parseFloat(document.getElementById('ny-wholesale').value || 0);
      var rate = parseFloat(document.getElementById('ny-rate').value || 9);
      var tax = wholesale * (rate/100);
      var total = wholesale + tax;
      var out = document.getElementById('ny-excise-output');
      out.innerHTML = '<strong>Estimated Wholesale Excise:</strong> ' + fmt(tax) + '<br><strong>Total Due:</strong> ' + fmt(total) + '<p style="margin-top:.5rem; font-size:.9rem;">For retail, remember NY collects 13% at point of sale (9% state + 4% local). This tool estimates wholesale excise only. Not tax advice.</p>';
      e.preventDefault();
    }
  }, false);
})();
