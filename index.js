var express = require('express');

/*****************************
	    App Variables
******************************/
var app = express();

/*****************************
	    App Routes
******************************/

app.use([express.static("views"), express.static("static")]);

app.get ("/", function (req, res) {
    res.render ("/index.html");
});
/*****************************
	  Start the server
******************************/
app.listen(3000, function () {
  console.log('Server starting on :3000');
});