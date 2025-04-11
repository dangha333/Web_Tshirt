<?php
class BaoCaoThongKeController {
    public $modelThongKe;

    public function __construct()
    {
        $this->modelThongKe = new ThongKe();
    }
    
    public function home()
    {
        // Fetch data from the model
        $revenue = $this->modelThongKe->getRevenueByStatus();
        $totalDH = $this->modelThongKe->getTotalDh();
        $totalUser = $this->modelThongKe->getTotalUser();
        $loiNhuan = $this->modelThongKe->getLoiNhuan();
        $monthlyProfits = $this->modelThongKe->getMoth();

        // Prepare data for charts
        $bieudoShow = array_column($monthlyProfits, 'monthly_profit');
        $bieudoArray = json_encode($bieudoShow);
        $bieudoMoth = array_column($monthlyProfits, 'month');
        $bieudoArrayMoth = json_encode($bieudoMoth);

        // Product statistics
        $totalSp = $this->modelThongKe->totalSp();
        $Dmsp1 = json_encode(array_column($totalSp, 'ten_danh_muc'));
        $Dmsp2 = json_encode(array_column($totalSp, 'totalSp'));

        // Growth percentage calculation
        $growthPercentages = [];
        for ($i = 1; $i < count($monthlyProfits); $i++) {
            $currentProfit = $monthlyProfits[$i]['monthly_profit'];
            $previousProfit = $monthlyProfits[$i - 1]['monthly_profit'];

            // Calculate growth percentage
            $growthPercentage = ($previousProfit != 0) ? (($currentProfit - $previousProfit) / $previousProfit) * 100 : 0;

            $growthPercentages[] = [
                'year' => $monthlyProfits[$i]['year'],
                'month' => $monthlyProfits[$i]['month'],
                'growth_percentage' => $growthPercentage
            ];
        }

        require_once './views/home.php';
    }
}
?>