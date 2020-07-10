<?php

namespace backend\controllers;

use common\models\search\DanhsachlopSearch;
use common\models\TblDiem;
use Yii;
use common\models\TblLophocphan;
use common\models\search\TblLophocphanSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\TblDangkyhocphan;
use yii\data\ArrayDataProvider;
use common\models\tblSinhVien;
use common\models\search\TblSinhvienSearch;
use Exception;
use yii\data\ActiveDataProvider;
/**
 * TblLophocphanController implements the CRUD actions for TblLophocphan model.
 */
class TblLophocphanController extends Controller
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
     * Lists all TblLophocphan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblLophocphanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        // $provider;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
            // 'provider'=>$provider,
        ]);
    }

     
    /**
     * Displays a single TblLophocphan model.
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
     * Creates a new TblLophocphan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblLophocphan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lophp_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblLophocphan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lophp_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionHaha($msv,$id)
    {
        ?>
        <script>alert("fff");</script>
        <?php
    }
    public function actionXemdiem($msv,$id)
    {
    $lhp=TblLophocphan::findOne(["lophp_id"=>$id]);
    $diem=TblDiem::findOne(["msv"=>$msv,"mahocphan"=> $lhp->mahocphan]);

    if($diem==null)
    {
        $newdiem= new TblDiem();
        $newdiem->diemX=null;
        $newdiem->diemY=null;
        $newdiem->diemZ=null;
        $newdiem->msv=$msv;
        $newdiem->mahocphan=$lhp->mahocphan;

        $newdiem->save();
        $diem=TblDiem::findOne(["msv"=>$msv,"mahocphan"=> $lhp->mahocphan]);

    }
    ?>
        <script>
            var id='<?php echo $diem->diem_id?>';

            window.location="http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-diem%2Fview&id="+id;
        </script>
        <?php

    }
    public function actionEditdiem($msv,$id)
    {
        $lhp=TblLophocphan::findOne(["lophp_id"=>$id]);
        $diem=TblDiem::findOne(["msv"=>$msv,"mahocphan"=> $lhp->mahocphan]);

        if($diem==null)
        {
            $newdiem= new TblDiem();
            $newdiem->diemX=null;
            $newdiem->diemY=null;
            $newdiem->diemZ=null;
            $newdiem->msv=$msv;
            $newdiem->mahocphan=$lhp->mahocphan;

            $newdiem->save();
            $diem=TblDiem::findOne(["msv"=>$msv,"mahocphan"=> $lhp->mahocphan]);

        }
        ?>
        <script>
            var id='<?php echo $diem->diem_id?>';

            window.location="http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-diem%2Fupdate&id="+id;
        </script>
        <?php
    }

    public function actionShowlistsv($id)
    {
        $models=TblDangkyhocphan::findAll(['lophp_id'=>$id]);
        $arr=array();

        for($i=0;$i<count($models);$i++)
        {
            $sv= tblSinhvien::findOne(['msv'=>$models[$i]["msv"]]);

            $arr[]=array(
                'msv'=>$sv->msv,
                'ten'=>$sv->ten,
                'malophanhchinh'=>$sv->malophanhchinh,
                'manganh'=>$sv->manganh,
                'lophp_id'=>$id
            );

        }
        $provider = new ArrayDataProvider([
            'allModels' => $arr,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['msv', 'ten','malophanhchinh','manganh'],
            ],
        ]);
        return $this->render('listsvview',['models'=>$models,'provider'=>$provider,'lophp_id'=>$id,'arr'=>$arr]);
    }
    public  function  actionExportlop($id)
    {

       ;
        return $this->render("exportdslop",["id"=>$id]);
    }
    public function actionExportdsl($lophp_id)
    {

        return $this->render("xuatexcel",["lophp_id"=>$lophp_id]);
    }


    /**
     * Deletes an existing TblLophocphan model.
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
    public function actionDeletesv($msv,$id)
    {

       ?>
        <script>

            var check = confirm("Bạn có chắc muốn xóa sinh viên này khỏi lớp không?");
            if(check)
            {
                <?php
                $dkhp= TblDangkyhocphan::findOne(['msv'=>$msv]);
                $dkhp->delete();
                ?>
            }
        </script>
        <?php



 ?>
        <script>
            var id= '<?php echo $id;?>';
            window.location="http://localhost:8000/caodangvmu/backend/web/index.php?r=tbl-lophocphan%2Fshowlistsv&id="+id;
        </script>
<?php

    }

    /**
     * Finds the TblLophocphan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblLophocphan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblLophocphan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
