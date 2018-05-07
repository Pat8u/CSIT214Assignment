const express = require('express');
const app = express();


var options = {
  index: 'Nodetesthtml.html'
};


app.use('/',express.static('test',options));


app.listen(3000, () => console.log('listening on port 3000'));

app.post('/',function(req,res){
	res.send('GOTCHA');
});






