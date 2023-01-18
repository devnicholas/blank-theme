var glob = require("glob");
var path = require("path");

module.exports = {
  entry: {
    scripts: glob.sync("./resources/js/*.js"),
  },
  output: {
    path: path.join(__dirname, "./static/dist"),
    filename: "[name].js",
  },
};
