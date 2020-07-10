<?php

namespace backend\controllers;

use common\models\SvUser;
use Yii;
use common\models\TblSinhvien;
use common\models\search\TblSinhvienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblSinhvienController implements the CRUD actions for TblSinhvien model.
 */
class TblSinhvienController extends Controller
{

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    /**
     * {@inheritdoc}
     */
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
     * Lists all TblSinhvien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSinhvienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSinhvien model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSinhvien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new TblSinhvien();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->msv]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblSinhvien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->msv]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblSinhvien model.
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
     * Finds the TblSinhvien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSinhvien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSinhvien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionXemdiem($msv)
    {
        ?>

            <script>
            var msv= '<?php echo $msv; ?>';
            window.location='../../connectClient/diemview.php?msv='+msv;
            </script>

        <?php
        
        
    }
    public function actionXoaAnh($idsv)
    {
        $sinhvien = TblSinhvien::findOne($idsv);
        if ($sinhvien->anh_dai_dien != 'no-image.jpg') {
            $path = dirname(dirname(__DIR__)).'/images/'.$sinhvien->anh_dai_dien;
            if (is_file($path)) {
                unlink($path);
                TblSinhvien::updateAll(['anh_dai_dien' => 'no-image.jpg'],['msv'=>$idsv]);
            }
        }
        else{
            Yii::$app->session->setFlash('thongbao',
                '<div class="alert alert-danger">Không thể xóa ảnh mặc định</div>');
        }


        return $this->redirect(Url::toRoute(['tbl-sinhvien/update', 'id' => $idsv]));
    }
}
