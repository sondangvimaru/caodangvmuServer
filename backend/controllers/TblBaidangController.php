<?php

namespace backend\controllers;

use Yii;
use common\models\TblBaidang;
use common\models\search\TblBaidangSearch;
use phpDocumentor\Reflection\Location;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblBaidangController implements the CRUD actions for TblBaidang model.
 */
class TblBaidangController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblBaidang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblBaidangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     
    public function actionView($id)
    {
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);


        
        ?>

        <script>
         
         var id='<?php echo $id ?>';
      var  url="http://localhost:8000/fontendcaodang/baidangdetail.php?baidang_id="+id;
        window.location=url;
          
        </script>
        <?php
    }

    /**
     * Creates a new TblBaidang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new TblBaidang();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->baidang_id]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);

        ?>
        <script>
        window.location="../views/tbl-baidang/addbaidang.php";
        </script>
        <?php
    }

    /**
     * Updates an existing TblBaidang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->baidang_id]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
        ?>
        <script>

                var id='<?php echo $id;?>';
            window.location="../views/tbl-baidang/update_baidang.php?baidang_id="+id;
        </script>
        <?php
    }

    /**
     * Deletes an existing TblBaidang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblBaidang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblBaidang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblBaidang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
