<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for HouseProfileData StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiHouseProfileData extends AbstractStructBase
{
    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_total;
    /**
     * The area_residential
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_residential;
    /**
     * The area_non_residential
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_non_residential;
    /**
     * The cadastral_number
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $cadastral_number;
    /**
     * The project_type
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $project_type;
    /**
     * The location_description
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $location_description;
    /**
     * The individual_name
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $individual_name;
    /**
     * The house_type
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $house_type;
    /**
     * The exploitation_start_year
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $exploitation_start_year;
    /**
     * The wall_material
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $wall_material;
    /**
     * The floor_type
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $floor_type;
    /**
     * The storeys_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $storeys_count;
    /**
     * The entrance_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $entrance_count;
    /**
     * The elevators_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $elevators_count;
    /**
     * The area_private
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_private;
    /**
     * The area_municipal
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_municipal;
    /**
     * The area_national
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_national;
    /**
     * The area_land
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_land;
    /**
     * The area_territory
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $area_territory;
    /**
     * The inventory_number
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $inventory_number;
    /**
     * The flats_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $flats_count;
    /**
     * The residents_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $residents_count;
    /**
     * The accounts_count
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var int
     */
    public $accounts_count;
    /**
     * The construction_features
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $construction_features;
    /**
     * The thermal_actual_expense
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $thermal_actual_expense;
    /**
     * The thermal_normative_expense
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $thermal_normative_expense;
    /**
     * The energy_efficiency
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $energy_efficiency;
    /**
     * The energy_audit_date
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $energy_audit_date;
    /**
     * The privatization_start_date
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $privatization_start_date;
    /**
     * The deterioration_total
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $deterioration_total;
    /**
     * The deterioration_foundation
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $deterioration_foundation;
    /**
     * The deterioration_bearing_walls
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $deterioration_bearing_walls;
    /**
     * The deterioration_floor
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float
     */
    public $deterioration_floor;
    /**
     * The facade
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiFacade
     */
    public $facade;
    /**
     * The roof
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiRoof
     */
    public $roof;
    /**
     * The basement
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiBasement
     */
    public $basement;
    /**
     * The common_space
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiCommonSpace
     */
    public $common_space;
    /**
     * The chute
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiChute
     */
    public $chute;
    /**
     * The heating_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiHeatingSystem
     */
    public $heating_system;
    /**
     * The hot_water_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiHotWaterSystem
     */
    public $hot_water_system;
    /**
     * The cold_water_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiColdWaterSystem
     */
    public $cold_water_system;
    /**
     * The sewerage_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiSewerageSystem
     */
    public $sewerage_system;
    /**
     * The electricity_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiElectricitySystem
     */
    public $electricity_system;
    /**
     * The gas_system
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiGasSystem
     */
    public $gas_system;
    /**
     * The lifts
     * Meta informations extracted from the WSDL
     * - nillable: true
     * - arrayType: tns:Lift[]
     * - ref: soap-enc:arrayType
     * @var \Api\StructType\ApiLift[]
     */
    public $lifts;
    /**
     * The management_contract
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiManagementContract
     */
    public $management_contract;
    /**
     * The heating_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $heating_provider;
    /**
     * The electricity_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $electricity_provider;
    /**
     * The gas_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $gas_provider;
    /**
     * The hot_water_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $hot_water_provider;
    /**
     * The cold_water_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $cold_water_provider;
    /**
     * The drainage_provider
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiProvider
     */
    public $drainage_provider;
    /**
     * The finance
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Api\StructType\ApiFinance
     */
    public $finance;
    /**
     * Constructor method for HouseProfileData
     * @uses ApiHouseProfileData::setArea_total()
     * @uses ApiHouseProfileData::setArea_residential()
     * @uses ApiHouseProfileData::setArea_non_residential()
     * @uses ApiHouseProfileData::setCadastral_number()
     * @uses ApiHouseProfileData::setProject_type()
     * @uses ApiHouseProfileData::setLocation_description()
     * @uses ApiHouseProfileData::setIndividual_name()
     * @uses ApiHouseProfileData::setHouse_type()
     * @uses ApiHouseProfileData::setExploitation_start_year()
     * @uses ApiHouseProfileData::setWall_material()
     * @uses ApiHouseProfileData::setFloor_type()
     * @uses ApiHouseProfileData::setStoreys_count()
     * @uses ApiHouseProfileData::setEntrance_count()
     * @uses ApiHouseProfileData::setElevators_count()
     * @uses ApiHouseProfileData::setArea_private()
     * @uses ApiHouseProfileData::setArea_municipal()
     * @uses ApiHouseProfileData::setArea_national()
     * @uses ApiHouseProfileData::setArea_land()
     * @uses ApiHouseProfileData::setArea_territory()
     * @uses ApiHouseProfileData::setInventory_number()
     * @uses ApiHouseProfileData::setFlats_count()
     * @uses ApiHouseProfileData::setResidents_count()
     * @uses ApiHouseProfileData::setAccounts_count()
     * @uses ApiHouseProfileData::setConstruction_features()
     * @uses ApiHouseProfileData::setThermal_actual_expense()
     * @uses ApiHouseProfileData::setThermal_normative_expense()
     * @uses ApiHouseProfileData::setEnergy_efficiency()
     * @uses ApiHouseProfileData::setEnergy_audit_date()
     * @uses ApiHouseProfileData::setPrivatization_start_date()
     * @uses ApiHouseProfileData::setDeterioration_total()
     * @uses ApiHouseProfileData::setDeterioration_foundation()
     * @uses ApiHouseProfileData::setDeterioration_bearing_walls()
     * @uses ApiHouseProfileData::setDeterioration_floor()
     * @uses ApiHouseProfileData::setFacade()
     * @uses ApiHouseProfileData::setRoof()
     * @uses ApiHouseProfileData::setBasement()
     * @uses ApiHouseProfileData::setCommon_space()
     * @uses ApiHouseProfileData::setChute()
     * @uses ApiHouseProfileData::setHeating_system()
     * @uses ApiHouseProfileData::setHot_water_system()
     * @uses ApiHouseProfileData::setCold_water_system()
     * @uses ApiHouseProfileData::setSewerage_system()
     * @uses ApiHouseProfileData::setElectricity_system()
     * @uses ApiHouseProfileData::setGas_system()
     * @uses ApiHouseProfileData::setLifts()
     * @uses ApiHouseProfileData::setManagement_contract()
     * @uses ApiHouseProfileData::setHeating_provider()
     * @uses ApiHouseProfileData::setElectricity_provider()
     * @uses ApiHouseProfileData::setGas_provider()
     * @uses ApiHouseProfileData::setHot_water_provider()
     * @uses ApiHouseProfileData::setCold_water_provider()
     * @uses ApiHouseProfileData::setDrainage_provider()
     * @uses ApiHouseProfileData::setFinance()
     * @param float $area_total
     * @param float $area_residential
     * @param float $area_non_residential
     * @param string $cadastral_number
     * @param string $project_type
     * @param string $location_description
     * @param string $individual_name
     * @param string $house_type
     * @param string $exploitation_start_year
     * @param string $wall_material
     * @param string $floor_type
     * @param int $storeys_count
     * @param int $entrance_count
     * @param int $elevators_count
     * @param float $area_private
     * @param float $area_municipal
     * @param float $area_national
     * @param float $area_land
     * @param float $area_territory
     * @param string $inventory_number
     * @param int $flats_count
     * @param int $residents_count
     * @param int $accounts_count
     * @param string $construction_features
     * @param float $thermal_actual_expense
     * @param float $thermal_normative_expense
     * @param string $energy_efficiency
     * @param string $energy_audit_date
     * @param string $privatization_start_date
     * @param float $deterioration_total
     * @param float $deterioration_foundation
     * @param float $deterioration_bearing_walls
     * @param float $deterioration_floor
     * @param \Api\StructType\ApiFacade $facade
     * @param \Api\StructType\ApiRoof $roof
     * @param \Api\StructType\ApiBasement $basement
     * @param \Api\StructType\ApiCommonSpace $common_space
     * @param \Api\StructType\ApiChute $chute
     * @param \Api\StructType\ApiHeatingSystem $heating_system
     * @param \Api\StructType\ApiHotWaterSystem $hot_water_system
     * @param \Api\StructType\ApiColdWaterSystem $cold_water_system
     * @param \Api\StructType\ApiSewerageSystem $sewerage_system
     * @param \Api\StructType\ApiElectricitySystem $electricity_system
     * @param \Api\StructType\ApiGasSystem $gas_system
     * @param \Api\StructType\ApiLift[] $lifts
     * @param \Api\StructType\ApiManagementContract $management_contract
     * @param \Api\StructType\ApiProvider $heating_provider
     * @param \Api\StructType\ApiProvider $electricity_provider
     * @param \Api\StructType\ApiProvider $gas_provider
     * @param \Api\StructType\ApiProvider $hot_water_provider
     * @param \Api\StructType\ApiProvider $cold_water_provider
     * @param \Api\StructType\ApiProvider $drainage_provider
     * @param \Api\StructType\ApiFinance $finance
     */
    public function __construct($area_total = null, $area_residential = null, $area_non_residential = null, $cadastral_number = null, $project_type = null, $location_description = null, $individual_name = null, $house_type = null, $exploitation_start_year = null, $wall_material = null, $floor_type = null, $storeys_count = null, $entrance_count = null, $elevators_count = null, $area_private = null, $area_municipal = null, $area_national = null, $area_land = null, $area_territory = null, $inventory_number = null, $flats_count = null, $residents_count = null, $accounts_count = null, $construction_features = null, $thermal_actual_expense = null, $thermal_normative_expense = null, $energy_efficiency = null, $energy_audit_date = null, $privatization_start_date = null, $deterioration_total = null, $deterioration_foundation = null, $deterioration_bearing_walls = null, $deterioration_floor = null, \Api\StructType\ApiFacade $facade = null, \Api\StructType\ApiRoof $roof = null, \Api\StructType\ApiBasement $basement = null, \Api\StructType\ApiCommonSpace $common_space = null, \Api\StructType\ApiChute $chute = null, \Api\StructType\ApiHeatingSystem $heating_system = null, \Api\StructType\ApiHotWaterSystem $hot_water_system = null, \Api\StructType\ApiColdWaterSystem $cold_water_system = null, \Api\StructType\ApiSewerageSystem $sewerage_system = null, \Api\StructType\ApiElectricitySystem $electricity_system = null, \Api\StructType\ApiGasSystem $gas_system = null, array $lifts = array(), \Api\StructType\ApiManagementContract $management_contract = null, \Api\StructType\ApiProvider $heating_provider = null, \Api\StructType\ApiProvider $electricity_provider = null, \Api\StructType\ApiProvider $gas_provider = null, \Api\StructType\ApiProvider $hot_water_provider = null, \Api\StructType\ApiProvider $cold_water_provider = null, \Api\StructType\ApiProvider $drainage_provider = null, \Api\StructType\ApiFinance $finance = null)
    {
        $this
            ->setArea_total($area_total)
            ->setArea_residential($area_residential)
            ->setArea_non_residential($area_non_residential)
            ->setCadastral_number($cadastral_number)
            ->setProject_type($project_type)
            ->setLocation_description($location_description)
            ->setIndividual_name($individual_name)
            ->setHouse_type($house_type)
            ->setExploitation_start_year($exploitation_start_year)
            ->setWall_material($wall_material)
            ->setFloor_type($floor_type)
            ->setStoreys_count($storeys_count)
            ->setEntrance_count($entrance_count)
            ->setElevators_count($elevators_count)
            ->setArea_private($area_private)
            ->setArea_municipal($area_municipal)
            ->setArea_national($area_national)
            ->setArea_land($area_land)
            ->setArea_territory($area_territory)
            ->setInventory_number($inventory_number)
            ->setFlats_count($flats_count)
            ->setResidents_count($residents_count)
            ->setAccounts_count($accounts_count)
            ->setConstruction_features($construction_features)
            ->setThermal_actual_expense($thermal_actual_expense)
            ->setThermal_normative_expense($thermal_normative_expense)
            ->setEnergy_efficiency($energy_efficiency)
            ->setEnergy_audit_date($energy_audit_date)
            ->setPrivatization_start_date($privatization_start_date)
            ->setDeterioration_total($deterioration_total)
            ->setDeterioration_foundation($deterioration_foundation)
            ->setDeterioration_bearing_walls($deterioration_bearing_walls)
            ->setDeterioration_floor($deterioration_floor)
            ->setFacade($facade)
            ->setRoof($roof)
            ->setBasement($basement)
            ->setCommon_space($common_space)
            ->setChute($chute)
            ->setHeating_system($heating_system)
            ->setHot_water_system($hot_water_system)
            ->setCold_water_system($cold_water_system)
            ->setSewerage_system($sewerage_system)
            ->setElectricity_system($electricity_system)
            ->setGas_system($gas_system)
            ->setLifts($lifts)
            ->setManagement_contract($management_contract)
            ->setHeating_provider($heating_provider)
            ->setElectricity_provider($electricity_provider)
            ->setGas_provider($gas_provider)
            ->setHot_water_provider($hot_water_provider)
            ->setCold_water_provider($cold_water_provider)
            ->setDrainage_provider($drainage_provider)
            ->setFinance($finance);
    }
    /**
     * Get area_total value
     * @return float|null
     */
    public function getArea_total()
    {
        return $this->area_total;
    }
    /**
     * Set area_total value
     * @param float $area_total
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_total($area_total = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_total) && strlen(substr($area_total, strpos($area_total, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_total, strpos($area_total, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_total) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_total)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_total, strpos($area_total, '.')))), __LINE__);
        }
        $this->area_total = $area_total;
        return $this;
    }
    /**
     * Get area_residential value
     * @return float|null
     */
    public function getArea_residential()
    {
        return $this->area_residential;
    }
    /**
     * Set area_residential value
     * @param float $area_residential
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_residential($area_residential = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_residential) && strlen(substr($area_residential, strpos($area_residential, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_residential, strpos($area_residential, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_residential) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_residential)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_residential, strpos($area_residential, '.')))), __LINE__);
        }
        $this->area_residential = $area_residential;
        return $this;
    }
    /**
     * Get area_non_residential value
     * @return float|null
     */
    public function getArea_non_residential()
    {
        return $this->area_non_residential;
    }
    /**
     * Set area_non_residential value
     * @param float $area_non_residential
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_non_residential($area_non_residential = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_non_residential) && strlen(substr($area_non_residential, strpos($area_non_residential, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_non_residential, strpos($area_non_residential, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_non_residential) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_non_residential)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_non_residential, strpos($area_non_residential, '.')))), __LINE__);
        }
        $this->area_non_residential = $area_non_residential;
        return $this;
    }
    /**
     * Get cadastral_number value
     * @return string|null
     */
    public function getCadastral_number()
    {
        return $this->cadastral_number;
    }
    /**
     * Set cadastral_number value
     * @param string $cadastral_number
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setCadastral_number($cadastral_number = null)
    {
        // validation for constraint: string
        if (!is_null($cadastral_number) && !is_string($cadastral_number)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($cadastral_number)), __LINE__);
        }
        $this->cadastral_number = $cadastral_number;
        return $this;
    }
    /**
     * Get project_type value
     * @return string|null
     */
    public function getProject_type()
    {
        return $this->project_type;
    }
    /**
     * Set project_type value
     * @param string $project_type
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setProject_type($project_type = null)
    {
        // validation for constraint: string
        if (!is_null($project_type) && !is_string($project_type)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($project_type)), __LINE__);
        }
        $this->project_type = $project_type;
        return $this;
    }
    /**
     * Get location_description value
     * @return string|null
     */
    public function getLocation_description()
    {
        return $this->location_description;
    }
    /**
     * Set location_description value
     * @param string $location_description
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setLocation_description($location_description = null)
    {
        // validation for constraint: string
        if (!is_null($location_description) && !is_string($location_description)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($location_description)), __LINE__);
        }
        $this->location_description = $location_description;
        return $this;
    }
    /**
     * Get individual_name value
     * @return string|null
     */
    public function getIndividual_name()
    {
        return $this->individual_name;
    }
    /**
     * Set individual_name value
     * @param string $individual_name
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setIndividual_name($individual_name = null)
    {
        // validation for constraint: string
        if (!is_null($individual_name) && !is_string($individual_name)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($individual_name)), __LINE__);
        }
        $this->individual_name = $individual_name;
        return $this;
    }
    /**
     * Get house_type value
     * @return string|null
     */
    public function getHouse_type()
    {
        return $this->house_type;
    }
    /**
     * Set house_type value
     * @uses \Api\EnumType\ApiHouseTypeEnum::valueIsValid()
     * @uses \Api\EnumType\ApiHouseTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $house_type
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setHouse_type($house_type = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiHouseTypeEnum::valueIsValid($house_type)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $house_type, implode(', ', \Api\EnumType\ApiHouseTypeEnum::getValidValues())), __LINE__);
        }
        $this->house_type = $house_type;
        return $this;
    }
    /**
     * Get exploitation_start_year value
     * @return string|null
     */
    public function getExploitation_start_year()
    {
        return $this->exploitation_start_year;
    }
    /**
     * Set exploitation_start_year value
     * @param string $exploitation_start_year
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setExploitation_start_year($exploitation_start_year = null)
    {
        // validation for constraint: string
        if (!is_null($exploitation_start_year) && !is_string($exploitation_start_year)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($exploitation_start_year)), __LINE__);
        }
        $this->exploitation_start_year = $exploitation_start_year;
        return $this;
    }
    /**
     * Get wall_material value
     * @return string|null
     */
    public function getWall_material()
    {
        return $this->wall_material;
    }
    /**
     * Set wall_material value
     * @uses \Api\EnumType\ApiHouseWallMaterialEnum::valueIsValid()
     * @uses \Api\EnumType\ApiHouseWallMaterialEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $wall_material
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setWall_material($wall_material = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiHouseWallMaterialEnum::valueIsValid($wall_material)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $wall_material, implode(', ', \Api\EnumType\ApiHouseWallMaterialEnum::getValidValues())), __LINE__);
        }
        $this->wall_material = $wall_material;
        return $this;
    }
    /**
     * Get floor_type value
     * @return string|null
     */
    public function getFloor_type()
    {
        return $this->floor_type;
    }
    /**
     * Set floor_type value
     * @uses \Api\EnumType\ApiHouseFloorTypeEnum::valueIsValid()
     * @uses \Api\EnumType\ApiHouseFloorTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $floor_type
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setFloor_type($floor_type = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiHouseFloorTypeEnum::valueIsValid($floor_type)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $floor_type, implode(', ', \Api\EnumType\ApiHouseFloorTypeEnum::getValidValues())), __LINE__);
        }
        $this->floor_type = $floor_type;
        return $this;
    }
    /**
     * Get storeys_count value
     * @return int|null
     */
    public function getStoreys_count()
    {
        return $this->storeys_count;
    }
    /**
     * Set storeys_count value
     * @param int $storeys_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setStoreys_count($storeys_count = null)
    {
        // validation for constraint: int
        if (!is_null($storeys_count) && !is_numeric($storeys_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($storeys_count)), __LINE__);
        }
        $this->storeys_count = $storeys_count;
        return $this;
    }
    /**
     * Get entrance_count value
     * @return int|null
     */
    public function getEntrance_count()
    {
        return $this->entrance_count;
    }
    /**
     * Set entrance_count value
     * @param int $entrance_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setEntrance_count($entrance_count = null)
    {
        // validation for constraint: int
        if (!is_null($entrance_count) && !is_numeric($entrance_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($entrance_count)), __LINE__);
        }
        $this->entrance_count = $entrance_count;
        return $this;
    }
    /**
     * Get elevators_count value
     * @return int|null
     */
    public function getElevators_count()
    {
        return $this->elevators_count;
    }
    /**
     * Set elevators_count value
     * @param int $elevators_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setElevators_count($elevators_count = null)
    {
        // validation for constraint: int
        if (!is_null($elevators_count) && !is_numeric($elevators_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($elevators_count)), __LINE__);
        }
        $this->elevators_count = $elevators_count;
        return $this;
    }
    /**
     * Get area_private value
     * @return float|null
     */
    public function getArea_private()
    {
        return $this->area_private;
    }
    /**
     * Set area_private value
     * @param float $area_private
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_private($area_private = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_private) && strlen(substr($area_private, strpos($area_private, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_private, strpos($area_private, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_private) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_private)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_private, strpos($area_private, '.')))), __LINE__);
        }
        $this->area_private = $area_private;
        return $this;
    }
    /**
     * Get area_municipal value
     * @return float|null
     */
    public function getArea_municipal()
    {
        return $this->area_municipal;
    }
    /**
     * Set area_municipal value
     * @param float $area_municipal
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_municipal($area_municipal = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_municipal) && strlen(substr($area_municipal, strpos($area_municipal, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_municipal, strpos($area_municipal, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_municipal) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_municipal)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_municipal, strpos($area_municipal, '.')))), __LINE__);
        }
        $this->area_municipal = $area_municipal;
        return $this;
    }
    /**
     * Get area_national value
     * @return float|null
     */
    public function getArea_national()
    {
        return $this->area_national;
    }
    /**
     * Set area_national value
     * @param float $area_national
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_national($area_national = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_national) && strlen(substr($area_national, strpos($area_national, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_national, strpos($area_national, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_national) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_national)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_national, strpos($area_national, '.')))), __LINE__);
        }
        $this->area_national = $area_national;
        return $this;
    }
    /**
     * Get area_land value
     * @return float|null
     */
    public function getArea_land()
    {
        return $this->area_land;
    }
    /**
     * Set area_land value
     * @param float $area_land
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_land($area_land = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_land) && strlen(substr($area_land, strpos($area_land, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_land, strpos($area_land, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_land) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_land)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_land, strpos($area_land, '.')))), __LINE__);
        }
        $this->area_land = $area_land;
        return $this;
    }
    /**
     * Get area_territory value
     * @return float|null
     */
    public function getArea_territory()
    {
        return $this->area_territory;
    }
    /**
     * Set area_territory value
     * @param float $area_territory
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setArea_territory($area_territory = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($area_territory) && strlen(substr($area_territory, strpos($area_territory, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($area_territory, strpos($area_territory, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($area_territory) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $area_territory)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($area_territory, strpos($area_territory, '.')))), __LINE__);
        }
        $this->area_territory = $area_territory;
        return $this;
    }
    /**
     * Get inventory_number value
     * @return string|null
     */
    public function getInventory_number()
    {
        return $this->inventory_number;
    }
    /**
     * Set inventory_number value
     * @param string $inventory_number
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setInventory_number($inventory_number = null)
    {
        // validation for constraint: string
        if (!is_null($inventory_number) && !is_string($inventory_number)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($inventory_number)), __LINE__);
        }
        $this->inventory_number = $inventory_number;
        return $this;
    }
    /**
     * Get flats_count value
     * @return int|null
     */
    public function getFlats_count()
    {
        return $this->flats_count;
    }
    /**
     * Set flats_count value
     * @param int $flats_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setFlats_count($flats_count = null)
    {
        // validation for constraint: int
        if (!is_null($flats_count) && !is_numeric($flats_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($flats_count)), __LINE__);
        }
        $this->flats_count = $flats_count;
        return $this;
    }
    /**
     * Get residents_count value
     * @return int|null
     */
    public function getResidents_count()
    {
        return $this->residents_count;
    }
    /**
     * Set residents_count value
     * @param int $residents_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setResidents_count($residents_count = null)
    {
        // validation for constraint: int
        if (!is_null($residents_count) && !is_numeric($residents_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($residents_count)), __LINE__);
        }
        $this->residents_count = $residents_count;
        return $this;
    }
    /**
     * Get accounts_count value
     * @return int|null
     */
    public function getAccounts_count()
    {
        return $this->accounts_count;
    }
    /**
     * Set accounts_count value
     * @param int $accounts_count
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setAccounts_count($accounts_count = null)
    {
        // validation for constraint: int
        if (!is_null($accounts_count) && !is_numeric($accounts_count)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($accounts_count)), __LINE__);
        }
        $this->accounts_count = $accounts_count;
        return $this;
    }
    /**
     * Get construction_features value
     * @return string|null
     */
    public function getConstruction_features()
    {
        return $this->construction_features;
    }
    /**
     * Set construction_features value
     * @param string $construction_features
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setConstruction_features($construction_features = null)
    {
        // validation for constraint: string
        if (!is_null($construction_features) && !is_string($construction_features)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($construction_features)), __LINE__);
        }
        $this->construction_features = $construction_features;
        return $this;
    }
    /**
     * Get thermal_actual_expense value
     * @return float|null
     */
    public function getThermal_actual_expense()
    {
        return $this->thermal_actual_expense;
    }
    /**
     * Set thermal_actual_expense value
     * @param float $thermal_actual_expense
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setThermal_actual_expense($thermal_actual_expense = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($thermal_actual_expense) && strlen(substr($thermal_actual_expense, strpos($thermal_actual_expense, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($thermal_actual_expense, strpos($thermal_actual_expense, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($thermal_actual_expense) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $thermal_actual_expense)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($thermal_actual_expense, strpos($thermal_actual_expense, '.')))), __LINE__);
        }
        $this->thermal_actual_expense = $thermal_actual_expense;
        return $this;
    }
    /**
     * Get thermal_normative_expense value
     * @return float|null
     */
    public function getThermal_normative_expense()
    {
        return $this->thermal_normative_expense;
    }
    /**
     * Set thermal_normative_expense value
     * @param float $thermal_normative_expense
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setThermal_normative_expense($thermal_normative_expense = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($thermal_normative_expense) && strlen(substr($thermal_normative_expense, strpos($thermal_normative_expense, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($thermal_normative_expense, strpos($thermal_normative_expense, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($thermal_normative_expense) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $thermal_normative_expense)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($thermal_normative_expense, strpos($thermal_normative_expense, '.')))), __LINE__);
        }
        $this->thermal_normative_expense = $thermal_normative_expense;
        return $this;
    }
    /**
     * Get energy_efficiency value
     * @return string|null
     */
    public function getEnergy_efficiency()
    {
        return $this->energy_efficiency;
    }
    /**
     * Set energy_efficiency value
     * @uses \Api\EnumType\ApiHouseEnergyEfficiencyClassEnum::valueIsValid()
     * @uses \Api\EnumType\ApiHouseEnergyEfficiencyClassEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $energy_efficiency
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setEnergy_efficiency($energy_efficiency = null)
    {
        // validation for constraint: enumeration
        if (!\Api\EnumType\ApiHouseEnergyEfficiencyClassEnum::valueIsValid($energy_efficiency)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $energy_efficiency, implode(', ', \Api\EnumType\ApiHouseEnergyEfficiencyClassEnum::getValidValues())), __LINE__);
        }
        $this->energy_efficiency = $energy_efficiency;
        return $this;
    }
    /**
     * Get energy_audit_date value
     * @return string|null
     */
    public function getEnergy_audit_date()
    {
        return $this->energy_audit_date;
    }
    /**
     * Set energy_audit_date value
     * @param string $energy_audit_date
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setEnergy_audit_date($energy_audit_date = null)
    {
        // validation for constraint: string
        if (!is_null($energy_audit_date) && !is_string($energy_audit_date)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($energy_audit_date)), __LINE__);
        }
        $this->energy_audit_date = $energy_audit_date;
        return $this;
    }
    /**
     * Get privatization_start_date value
     * @return string|null
     */
    public function getPrivatization_start_date()
    {
        return $this->privatization_start_date;
    }
    /**
     * Set privatization_start_date value
     * @param string $privatization_start_date
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setPrivatization_start_date($privatization_start_date = null)
    {
        // validation for constraint: string
        if (!is_null($privatization_start_date) && !is_string($privatization_start_date)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($privatization_start_date)), __LINE__);
        }
        $this->privatization_start_date = $privatization_start_date;
        return $this;
    }
    /**
     * Get deterioration_total value
     * @return float|null
     */
    public function getDeterioration_total()
    {
        return $this->deterioration_total;
    }
    /**
     * Set deterioration_total value
     * @param float $deterioration_total
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setDeterioration_total($deterioration_total = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($deterioration_total) && strlen(substr($deterioration_total, strpos($deterioration_total, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($deterioration_total, strpos($deterioration_total, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($deterioration_total) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $deterioration_total)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($deterioration_total, strpos($deterioration_total, '.')))), __LINE__);
        }
        $this->deterioration_total = $deterioration_total;
        return $this;
    }
    /**
     * Get deterioration_foundation value
     * @return float|null
     */
    public function getDeterioration_foundation()
    {
        return $this->deterioration_foundation;
    }
    /**
     * Set deterioration_foundation value
     * @param float $deterioration_foundation
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setDeterioration_foundation($deterioration_foundation = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($deterioration_foundation) && strlen(substr($deterioration_foundation, strpos($deterioration_foundation, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($deterioration_foundation, strpos($deterioration_foundation, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($deterioration_foundation) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $deterioration_foundation)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($deterioration_foundation, strpos($deterioration_foundation, '.')))), __LINE__);
        }
        $this->deterioration_foundation = $deterioration_foundation;
        return $this;
    }
    /**
     * Get deterioration_bearing_walls value
     * @return float|null
     */
    public function getDeterioration_bearing_walls()
    {
        return $this->deterioration_bearing_walls;
    }
    /**
     * Set deterioration_bearing_walls value
     * @param float $deterioration_bearing_walls
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setDeterioration_bearing_walls($deterioration_bearing_walls = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($deterioration_bearing_walls) && strlen(substr($deterioration_bearing_walls, strpos($deterioration_bearing_walls, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($deterioration_bearing_walls, strpos($deterioration_bearing_walls, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($deterioration_bearing_walls) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $deterioration_bearing_walls)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($deterioration_bearing_walls, strpos($deterioration_bearing_walls, '.')))), __LINE__);
        }
        $this->deterioration_bearing_walls = $deterioration_bearing_walls;
        return $this;
    }
    /**
     * Get deterioration_floor value
     * @return float|null
     */
    public function getDeterioration_floor()
    {
        return $this->deterioration_floor;
    }
    /**
     * Set deterioration_floor value
     * @param float $deterioration_floor
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setDeterioration_floor($deterioration_floor = null)
    {
        // validation for constraint: fractionDigits
        if (is_float($deterioration_floor) && strlen(substr($deterioration_floor, strpos($deterioration_floor, '.') + 1)) !== 2) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 2 fraction digits, "%d" given', strlen(substr($deterioration_floor, strpos($deterioration_floor, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits
        if (is_float($deterioration_floor) && strlen(str_replace(array(' ', '.', ',', '-', '+'), '', $deterioration_floor)) !== 15) {
            throw new \InvalidArgumentException(sprintf('Invalid value, the value must at most contain 15 digits, "%d" given', strlen(substr($deterioration_floor, strpos($deterioration_floor, '.')))), __LINE__);
        }
        $this->deterioration_floor = $deterioration_floor;
        return $this;
    }
    /**
     * Get facade value
     * @return \Api\StructType\ApiFacade|null
     */
    public function getFacade()
    {
        return $this->facade;
    }
    /**
     * Set facade value
     * @param \Api\StructType\ApiFacade $facade
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setFacade(\Api\StructType\ApiFacade $facade = null)
    {
        $this->facade = $facade;
        return $this;
    }
    /**
     * Get roof value
     * @return \Api\StructType\ApiRoof|null
     */
    public function getRoof()
    {
        return $this->roof;
    }
    /**
     * Set roof value
     * @param \Api\StructType\ApiRoof $roof
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setRoof(\Api\StructType\ApiRoof $roof = null)
    {
        $this->roof = $roof;
        return $this;
    }
    /**
     * Get basement value
     * @return \Api\StructType\ApiBasement|null
     */
    public function getBasement()
    {
        return $this->basement;
    }
    /**
     * Set basement value
     * @param \Api\StructType\ApiBasement $basement
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setBasement(\Api\StructType\ApiBasement $basement = null)
    {
        $this->basement = $basement;
        return $this;
    }
    /**
     * Get common_space value
     * @return \Api\StructType\ApiCommonSpace|null
     */
    public function getCommon_space()
    {
        return $this->common_space;
    }
    /**
     * Set common_space value
     * @param \Api\StructType\ApiCommonSpace $common_space
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setCommon_space(\Api\StructType\ApiCommonSpace $common_space = null)
    {
        $this->common_space = $common_space;
        return $this;
    }
    /**
     * Get chute value
     * @return \Api\StructType\ApiChute|null
     */
    public function getChute()
    {
        return $this->chute;
    }
    /**
     * Set chute value
     * @param \Api\StructType\ApiChute $chute
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setChute(\Api\StructType\ApiChute $chute = null)
    {
        $this->chute = $chute;
        return $this;
    }
    /**
     * Get heating_system value
     * @return \Api\StructType\ApiHeatingSystem|null
     */
    public function getHeating_system()
    {
        return $this->heating_system;
    }
    /**
     * Set heating_system value
     * @param \Api\StructType\ApiHeatingSystem $heating_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setHeating_system(\Api\StructType\ApiHeatingSystem $heating_system = null)
    {
        $this->heating_system = $heating_system;
        return $this;
    }
    /**
     * Get hot_water_system value
     * @return \Api\StructType\ApiHotWaterSystem|null
     */
    public function getHot_water_system()
    {
        return $this->hot_water_system;
    }
    /**
     * Set hot_water_system value
     * @param \Api\StructType\ApiHotWaterSystem $hot_water_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setHot_water_system(\Api\StructType\ApiHotWaterSystem $hot_water_system = null)
    {
        $this->hot_water_system = $hot_water_system;
        return $this;
    }
    /**
     * Get cold_water_system value
     * @return \Api\StructType\ApiColdWaterSystem|null
     */
    public function getCold_water_system()
    {
        return $this->cold_water_system;
    }
    /**
     * Set cold_water_system value
     * @param \Api\StructType\ApiColdWaterSystem $cold_water_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setCold_water_system(\Api\StructType\ApiColdWaterSystem $cold_water_system = null)
    {
        $this->cold_water_system = $cold_water_system;
        return $this;
    }
    /**
     * Get sewerage_system value
     * @return \Api\StructType\ApiSewerageSystem|null
     */
    public function getSewerage_system()
    {
        return $this->sewerage_system;
    }
    /**
     * Set sewerage_system value
     * @param \Api\StructType\ApiSewerageSystem $sewerage_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setSewerage_system(\Api\StructType\ApiSewerageSystem $sewerage_system = null)
    {
        $this->sewerage_system = $sewerage_system;
        return $this;
    }
    /**
     * Get electricity_system value
     * @return \Api\StructType\ApiElectricitySystem|null
     */
    public function getElectricity_system()
    {
        return $this->electricity_system;
    }
    /**
     * Set electricity_system value
     * @param \Api\StructType\ApiElectricitySystem $electricity_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setElectricity_system(\Api\StructType\ApiElectricitySystem $electricity_system = null)
    {
        $this->electricity_system = $electricity_system;
        return $this;
    }
    /**
     * Get gas_system value
     * @return \Api\StructType\ApiGasSystem|null
     */
    public function getGas_system()
    {
        return $this->gas_system;
    }
    /**
     * Set gas_system value
     * @param \Api\StructType\ApiGasSystem $gas_system
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setGas_system(\Api\StructType\ApiGasSystem $gas_system = null)
    {
        $this->gas_system = $gas_system;
        return $this;
    }
    /**
     * Get lifts value
     * @return \Api\StructType\ApiLift[]|null
     */
    public function getLifts()
    {
        return $this->lifts;
    }
    /**
     * Set lifts value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiLift[] $lifts
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setLifts(array $lifts = array())
    {
        foreach ($lifts as $houseProfileDataLiftsItem) {
            // validation for constraint: itemType
            if (!$houseProfileDataLiftsItem instanceof \Api\StructType\ApiLift) {
                throw new \InvalidArgumentException(sprintf('The lifts property can only contain items of \Api\StructType\ApiLift, "%s" given', is_object($houseProfileDataLiftsItem) ? get_class($houseProfileDataLiftsItem) : gettype($houseProfileDataLiftsItem)), __LINE__);
            }
        }
        $this->lifts = $lifts;
        return $this;
    }
    /**
     * Add item to lifts value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiLift $item
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function addToLifts(\Api\StructType\ApiLift $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiLift) {
            throw new \InvalidArgumentException(sprintf('The lifts property can only contain items of \Api\StructType\ApiLift, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->lifts[] = $item;
        return $this;
    }
    /**
     * Get management_contract value
     * @return \Api\StructType\ApiManagementContract|null
     */
    public function getManagement_contract()
    {
        return $this->management_contract;
    }
    /**
     * Set management_contract value
     * @param \Api\StructType\ApiManagementContract $management_contract
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setManagement_contract(\Api\StructType\ApiManagementContract $management_contract = null)
    {
        $this->management_contract = $management_contract;
        return $this;
    }
    /**
     * Get heating_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getHeating_provider()
    {
        return $this->heating_provider;
    }
    /**
     * Set heating_provider value
     * @param \Api\StructType\ApiProvider $heating_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setHeating_provider(\Api\StructType\ApiProvider $heating_provider = null)
    {
        $this->heating_provider = $heating_provider;
        return $this;
    }
    /**
     * Get electricity_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getElectricity_provider()
    {
        return $this->electricity_provider;
    }
    /**
     * Set electricity_provider value
     * @param \Api\StructType\ApiProvider $electricity_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setElectricity_provider(\Api\StructType\ApiProvider $electricity_provider = null)
    {
        $this->electricity_provider = $electricity_provider;
        return $this;
    }
    /**
     * Get gas_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getGas_provider()
    {
        return $this->gas_provider;
    }
    /**
     * Set gas_provider value
     * @param \Api\StructType\ApiProvider $gas_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setGas_provider(\Api\StructType\ApiProvider $gas_provider = null)
    {
        $this->gas_provider = $gas_provider;
        return $this;
    }
    /**
     * Get hot_water_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getHot_water_provider()
    {
        return $this->hot_water_provider;
    }
    /**
     * Set hot_water_provider value
     * @param \Api\StructType\ApiProvider $hot_water_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setHot_water_provider(\Api\StructType\ApiProvider $hot_water_provider = null)
    {
        $this->hot_water_provider = $hot_water_provider;
        return $this;
    }
    /**
     * Get cold_water_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getCold_water_provider()
    {
        return $this->cold_water_provider;
    }
    /**
     * Set cold_water_provider value
     * @param \Api\StructType\ApiProvider $cold_water_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setCold_water_provider(\Api\StructType\ApiProvider $cold_water_provider = null)
    {
        $this->cold_water_provider = $cold_water_provider;
        return $this;
    }
    /**
     * Get drainage_provider value
     * @return \Api\StructType\ApiProvider|null
     */
    public function getDrainage_provider()
    {
        return $this->drainage_provider;
    }
    /**
     * Set drainage_provider value
     * @param \Api\StructType\ApiProvider $drainage_provider
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setDrainage_provider(\Api\StructType\ApiProvider $drainage_provider = null)
    {
        $this->drainage_provider = $drainage_provider;
        return $this;
    }
    /**
     * Get finance value
     * @return \Api\StructType\ApiFinance|null
     */
    public function getFinance()
    {
        return $this->finance;
    }
    /**
     * Set finance value
     * @param \Api\StructType\ApiFinance $finance
     * @return \Api\StructType\ApiHouseProfileData
     */
    public function setFinance(\Api\StructType\ApiFinance $finance = null)
    {
        $this->finance = $finance;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiHouseProfileData
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
