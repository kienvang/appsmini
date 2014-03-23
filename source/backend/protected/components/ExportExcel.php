<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tung
 * Date: 11/18/13
 * Time: 2:20 PM
 * To change this template use File | Settings | File Templates.
 */

class ExportExcel {
    const ROW_BEGIN = 9;
    const COL_BEGIN = 5;
    private $worksheet;
    private $objPHPExcel;
    private $sharedStyleContent;

    private $cols;
    private $style;
    private $columns;

    private $row_index;

    /**
     * @return ExportExcel
     */
    public static function create(){
        return new ExportExcel();
    }

    public function export($data, $columns, $title){
        if (!$data) return;

        $this->export_init($columns, $title);

        $i_row = self::ROW_BEGIN + 1;

        foreach($data as $val){
            $this->worksheet->setCellValue (Util::getNameFromNumber(self::COL_BEGIN) . $i_row, $i_row - self::ROW_BEGIN);
            $this->setStyle(Util::getNameFromNumber(self::COL_BEGIN) . $i_row);
            foreach($columns as $col => $v){
                $this->worksheet->setCellValue ($this->cols[$col] . $i_row, $val[$col]);
                $this->setStyle($this->cols[$col] . $i_row, $val[$col]);
            }
            $i_row++;
        }

        $this->end();
    }

    public function export_write($row){
        $this->worksheet->setCellValue (Util::getNameFromNumber(self::COL_BEGIN) . $this->row_index, $this->row_index - self::ROW_BEGIN);
        $this->setStyle(Util::getNameFromNumber(self::COL_BEGIN) . $this->row_index);
        foreach($this->columns as $col => $v){
            $this->worksheet->setCellValue ($this->cols[$col] . $this->row_index, $row[$col]);
            $this->setStyle($this->cols[$col] . $this->row_index, $row[$col]);
        }

        $this->row_index++;
    }

    /**
     * @param $cell : A2
     * @param $value
     */
    public function export_write_cell($cell, $value){
        $this->worksheet->setCellValue ($cell, $value);
    }

    public function export_init($columns, $title){
        $this->start($title);
        $this->columns = $columns;

        $this->cols = array();
        $i_col = self::COL_BEGIN + 1;
        $this->style = $this->formatChart();

        $sharedStyle1 = new PHPExcel_Style();
        $sharedStyle1->applyFromArray($this->style['header']);

        $this->worksheet->setSharedStyle($sharedStyle1, Util::getNameFromNumber($i_col-1).self::ROW_BEGIN);
        foreach($columns as $col => $name){
            $c = Util::getNameFromNumber($i_col + count($this->cols));
            $this->worksheet->setCellValue ( $c . self::ROW_BEGIN, $name );
            $this->worksheet->setSharedStyle($sharedStyle1, $c.self::ROW_BEGIN);

            $this->worksheet->getStyle($c.self::ROW_BEGIN)->getAlignment()->setWrapText(true);
            $this->worksheet->getColumnDimension($c)->setAutoSize(true);
            $this->cols[$col] = $c;
        }

        $this->row_index = self::ROW_BEGIN + 1;
    }

    public function start($title){
        Yii::import('application.extensions.phpexcel.XPHPExcel');

        $this->objPHPExcel = XPHPExcel::createPHPExcel();
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->objPHPExcel = $objReader->load(Yii::getPathOfAlias('themes').DIRECTORY_SEPARATOR."v1/resources/assets/templates/report.xlsx");

        $this->objPHPExcel->getProperties ()->setTitle ( $title );
        $this->objPHPExcel->setActiveSheetIndex ( 0 );

        ob_end_clean ();
        ob_start ();

        $this->worksheet = $this->objPHPExcel->getActiveSheet();

        $this->worksheet->setTitle ( $title );
        $this->worksheet->setCellValue('F7', $title);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
    }

    public function end(){
        $objWriter = PHPExcel_IOFactory::createWriter ( $this->objPHPExcel, 'Excel2007' );
        ob_end_clean();
        $objWriter->save ( 'php://output' );

        Yii::app()->end();
        exit();
    }

    private function setStyle($cell, $val = null){
        $sharedStyle = new PHPExcel_Style();
        $style = $this->style['body'];
        if ($val != null){
            if (is_numeric($val))
                $style['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
            else{
                $style['alignment']['horizontal'] = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
            }
        }

        $sharedStyle->applyFromArray($style);
        $this->worksheet->setSharedStyle($sharedStyle, $cell);
    }

    private function formatChart(){
        $default_border = array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            /*'color' => array('rgb'=>'1006A3')*/
        );
        $style = array(
            'header' => array(
                'borders' => array(
                    'bottom' => $default_border,
                    'left' => $default_border,
                    'top' => $default_border,
                    'right' => $default_border,
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,

                ),
                'font' => array(
                    'bold' => true,
                    //'color' => array('rgb'=>'000000')
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrapText' => true
                )
            ),
            'body' => array(
                'borders' => array(
                    'bottom' => $default_border,
                    'left' => $default_border,
                    'top' => $default_border,
                    'right' => $default_border,
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                ),
                'font' => array(
                    //'color' => array('rgb'=>'000000')
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrapText' => true
                )
            )
        );
        return $style;
    }
}