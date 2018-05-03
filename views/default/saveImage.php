<script src="/js/ng-canvas-gauge/angular.min.js" type="text/javascript"></script>
<script src="/js/ng-canvas-gauge/ngCanvasGauge.js" type="text/javascript"></script>
<canvas-gauge id="scream" width="240" under-color="#EFEFEF" over-color="#008000" value="males" mask="(@)%" style="color: gray"></canvas-gauge>
<input id="idata" type="hidden" value="" />
<script type="text/javascript">
    var app = angular.module('test_percDisplay', ['ngCanvasGauge']);
    app.controller('mainController', function($scope) {
        $scope.males = <?= (isset($_GET['r']))?$_GET['r']:100 ?>;
//        var canvasData = document.getElementById("idata").value;
//        alert(canvasData);

    });
    function saveImage(cdata){
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "/projectbusinessidea/default/save-image");
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", 'imageData');
        hiddenField.setAttribute("value", cdata);

        form.appendChild(hiddenField);

        var hiddenFieldA = document.createElement("input");
        hiddenFieldA.setAttribute("type", "hidden");
        hiddenFieldA.setAttribute("name", 'filename');
        hiddenFieldA.setAttribute("value", "<?= (isset($_GET['f']))?$_GET['f']:"test" ?>");

        form.appendChild(hiddenFieldA);

        var hiddenFieldB = document.createElement("input");
        hiddenFieldB.setAttribute("type", "hidden");
        hiddenFieldB.setAttribute("name", '_csrf');
        hiddenFieldB.setAttribute("value", "<?=Yii::$app->request->getCsrfToken()?>");

        form.appendChild(hiddenFieldB);

        document.body.appendChild(form);
        form.submit();
    }
</script>