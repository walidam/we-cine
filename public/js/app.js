require('../css/app.scss');
require('../css/list-groups.css');
require('/node_modules/font-awesome/css/font-awesome.css');
import * as bootstrap from 'bootstrap'

const routes = require('/public/js/fos_js_routes.json');
import Routing from '/public/bundles/fosjsrouting/js/router.min.js';

Routing.setRoutingData(routes);
window.Routing = Routing;
