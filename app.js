var express = require('express');

/*****************************
	    App Variables
******************************/
var app = express();

/*****************************
	    App Routes
******************************/

app.use([express.static("views"), express.static("static")]);
app.set('port', (process.env.PORT || 5000));
app.get ("/", function (req, res) {
    res.render ("/index.html");
});
/*****************************
	  Start the server
******************************/
app.listen(app.get('port'), function () {
  console.log('Server starting');
});