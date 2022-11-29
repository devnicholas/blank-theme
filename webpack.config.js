var glob = require("glob");
var path = require("path");

module.exports = {
  entry: {
    scripts: glob.sync("./src/js/*.js"),
  },
  output: {
    path: path.join(__dirname, "./dist"),
    filename: "[name].js",
  },
};
