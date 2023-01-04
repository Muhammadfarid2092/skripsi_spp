function refreshForm() {
  const className = ['peduli', 'disiplin', 'jujur', 'percaya diri', 'tanggung jawab'];

  for (let i = 0; i < className.length; i++) {
    for (let j = 0; j < 10; j++) {
      var ele = document.getElementsByName(`${className[i]}_${j}`)
      for(var k=0; k < ele.length; k++) {
        ele[k].checked = false;
      }
    }
  }
}