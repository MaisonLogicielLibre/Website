<?php
/**
 * GoogleChart Helper
 *
 * @category Helper
 * @package  Website
 * @author   Rignon Noël <rignon.noel@openmailbox.org>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * GoogleChart Helper
 *
 * @category Helper
 * @package  Website
 * @author   Rignon Noël <rignon.noel@openmailbox.org>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class GoogleChartHelper extends Helper
{

    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $defaultConfig = [];

    /*
     * Type of chart
     *
     * GeoChart
     * ScatterChart
     * ColumnChart
     * Histogram
     * BarChart
     * ComboChart
     * AreaChart
     * SteppedAreaChart
     * LineChart
     * PieChart
     * BubbleChart
     * Timeline
     */
    protected $type;

    protected $name;

    protected $options;

    protected $columns;

    protected $rows;

    /**
     * Start new chart
     */
    public function create($type, $name) {
        $this->type = $type;
        $this->name = $name;

        $this->options = null;
        $this->columns = null;
        $this->rows = null;

        return $this;
    }

    /**
     * Output chart using echo
     */
    public function __toString() {
        $this->Html->script('https://www.google.com/jsapi', ['block' => 'scriptBottom']);
        $this->Html->scriptStart(['block' => 'scriptBottom']);
        echo "google.load('visualization', '1.1', {packages: ['corechart', 'bar', 'timeline', 'orgchart']});\t\r";
        echo "google.setOnLoadCallback(draw" . $this->name . ");\t\r\t\r";
        echo "function draw" . $this->name . "() {\t\r";

        // Print columns
        echo "  var data = new google.visualization.DataTable();\t\r";
        foreach ($this->columns as $column) {
            echo "  data.addColumn('" . $column[0] . "', '" . $column[1] . "');\t\r";
        }

        // Print rows
        echo "  data.addRows([\t\r";
        foreach ($this->rows as $row) {
            echo "      [";
            foreach ($row as $count => $element) {
                if($this->columns[$count][0] == 'string')
                {
                    echo "'";
                }
                echo $element;
                if($this->columns[$count][0] == 'string')
                {
                    echo "'";
                }
                echo ',';
            }
            echo "],\t\r";
        }
        echo "  ]);\t\r";

        // Print options
        echo "  var options = {";
        if ($this->options) {
            $this->printOption($this->options);
        }
        else {
            echo "  };\t\r";
        }

        // Ask to display the chart
        echo "  var chart = new google.visualization." . $this->type . "(\t\r";
        echo "  document.getElementById('"  . $this->name . "'));\t\r";
        echo "  chart.draw(data, options);\t\r";
        echo "}\t\r";

        $this->Html->scriptEnd();

        return "<div id='" . $this->name . "'></div>";
    }

    /**
     * Recursive function to print JS option
     */
    protected function printOption($tableOfOption, $level=0) {
        foreach ($tableOfOption as $key => $value) {
            if (is_array($value)) {
                echo $key . ": {\t\r";
                $this->printOption($value, $level+1);
            }
            else {
                    echo $key . ": '" . $value . "',\t\r";
            }

        }

        if ($level == 0) {
            echo "};\t\r";
        } else {
            echo "},\t\r";
        }
    }

    /**
     * Add row
     */
    public function addRow($row) {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * Add multiple rows
     */
    public function addRows($rows) {
        foreach ($rows as $row) {
            $this->rows[] = $row;
        }

        return $this;
    }

    /**
     * Add column
     */
    public function addColumn($column) {
        $this->columns[] = $column;

        return $this;
    }

    /**
     * Add multiple columns
     */
    public function addColumns($columns) {
        foreach ($columns as $column) {
            $this->columns[] = $column;
        }

        return $this;
    }

    /**
     * Set options
     */
    public function setOptions($options) {
        $this->options = [];

        foreach ($options as $option => $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }
}
