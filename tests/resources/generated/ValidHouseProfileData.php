<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

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
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_total = null;
    /**
     * The area_residential
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_residential = null;
    /**
     * The area_non_residential
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_non_residential = null;
    /**
     * The cadastral_number
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $cadastral_number = null;
    /**
     * The project_type
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $project_type = null;
    /**
     * The location_description
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $location_description = null;
    /**
     * The individual_name
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $individual_name = null;
    /**
     * The house_type
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $house_type = null;
    /**
     * The exploitation_start_year
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $exploitation_start_year = null;
    /**
     * The wall_material
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $wall_material = null;
    /**
     * The floor_type
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $floor_type = null;
    /**
     * The storeys_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $storeys_count = null;
    /**
     * The entrance_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $entrance_count = null;
    /**
     * The elevators_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $elevators_count = null;
    /**
     * The area_private
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_private = null;
    /**
     * The area_municipal
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_municipal = null;
    /**
     * The area_national
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_national = null;
    /**
     * The area_land
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_land = null;
    /**
     * The area_territory
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $area_territory = null;
    /**
     * The inventory_number
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $inventory_number = null;
    /**
     * The flats_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $flats_count = null;
    /**
     * The residents_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $residents_count = null;
    /**
     * The accounts_count
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var int|null
     */
    protected ?int $accounts_count = null;
    /**
     * The construction_features
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $construction_features = null;
    /**
     * The thermal_actual_expense
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $thermal_actual_expense = null;
    /**
     * The thermal_normative_expense
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $thermal_normative_expense = null;
    /**
     * The energy_efficiency
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $energy_efficiency = null;
    /**
     * The energy_audit_date
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $energy_audit_date = null;
    /**
     * The privatization_start_date
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var string|null
     */
    protected ?string $privatization_start_date = null;
    /**
     * The deterioration_total
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $deterioration_total = null;
    /**
     * The deterioration_foundation
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $deterioration_foundation = null;
    /**
     * The deterioration_bearing_walls
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $deterioration_bearing_walls = null;
    /**
     * The deterioration_floor
     * Meta information extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - nillable: true
     * - totalDigits: 15
     * @var float|null
     */
    protected ?float $deterioration_floor = null;
    /**
     * The facade
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiFacade|null
     */
    protected ?\StructType\ApiFacade $facade = null;
    /**
     * The roof
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiRoof|null
     */
    protected ?\StructType\ApiRoof $roof = null;
    /**
     * The basement
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiBasement|null
     */
    protected ?\StructType\ApiBasement $basement = null;
    /**
     * The common_space
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiCommonSpace|null
     */
    protected ?\StructType\ApiCommonSpace $common_space = null;
    /**
     * The chute
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiChute|null
     */
    protected ?\StructType\ApiChute $chute = null;
    /**
     * The heating_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiHeatingSystem|null
     */
    protected ?\StructType\ApiHeatingSystem $heating_system = null;
    /**
     * The hot_water_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiHotWaterSystem|null
     */
    protected ?\StructType\ApiHotWaterSystem $hot_water_system = null;
    /**
     * The cold_water_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiColdWaterSystem|null
     */
    protected ?\StructType\ApiColdWaterSystem $cold_water_system = null;
    /**
     * The sewerage_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiSewerageSystem|null
     */
    protected ?\StructType\ApiSewerageSystem $sewerage_system = null;
    /**
     * The electricity_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiElectricitySystem|null
     */
    protected ?\StructType\ApiElectricitySystem $electricity_system = null;
    /**
     * The gas_system
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiGasSystem|null
     */
    protected ?\StructType\ApiGasSystem $gas_system = null;
    /**
     * The lifts
     * Meta information extracted from the WSDL
     * - arrayType: tns:Lift[]
     * - base: soap-enc:Array
     * - nillable: true
     * - ref: soap-enc:arrayType
     * @var \StructType\ApiLift[]
     */
    protected ?array $lifts = null;
    /**
     * The management_contract
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiManagementContract|null
     */
    protected ?\StructType\ApiManagementContract $management_contract = null;
    /**
     * The heating_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $heating_provider = null;
    /**
     * The electricity_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $electricity_provider = null;
    /**
     * The gas_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $gas_provider = null;
    /**
     * The hot_water_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $hot_water_provider = null;
    /**
     * The cold_water_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $cold_water_provider = null;
    /**
     * The drainage_provider
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiProvider|null
     */
    protected ?\StructType\ApiProvider $drainage_provider = null;
    /**
     * The finance
     * Meta information extracted from the WSDL
     * - nillable: true
     * @var \StructType\ApiFinance|null
     */
    protected ?\StructType\ApiFinance $finance = null;
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
     * @param \StructType\ApiFacade $facade
     * @param \StructType\ApiRoof $roof
     * @param \StructType\ApiBasement $basement
     * @param \StructType\ApiCommonSpace $common_space
     * @param \StructType\ApiChute $chute
     * @param \StructType\ApiHeatingSystem $heating_system
     * @param \StructType\ApiHotWaterSystem $hot_water_system
     * @param \StructType\ApiColdWaterSystem $cold_water_system
     * @param \StructType\ApiSewerageSystem $sewerage_system
     * @param \StructType\ApiElectricitySystem $electricity_system
     * @param \StructType\ApiGasSystem $gas_system
     * @param \StructType\ApiLift[] $lifts
     * @param \StructType\ApiManagementContract $management_contract
     * @param \StructType\ApiProvider $heating_provider
     * @param \StructType\ApiProvider $electricity_provider
     * @param \StructType\ApiProvider $gas_provider
     * @param \StructType\ApiProvider $hot_water_provider
     * @param \StructType\ApiProvider $cold_water_provider
     * @param \StructType\ApiProvider $drainage_provider
     * @param \StructType\ApiFinance $finance
     */
    public function __construct(?float $area_total = null, ?float $area_residential = null, ?float $area_non_residential = null, ?string $cadastral_number = null, ?string $project_type = null, ?string $location_description = null, ?string $individual_name = null, ?string $house_type = null, ?string $exploitation_start_year = null, ?string $wall_material = null, ?string $floor_type = null, ?int $storeys_count = null, ?int $entrance_count = null, ?int $elevators_count = null, ?float $area_private = null, ?float $area_municipal = null, ?float $area_national = null, ?float $area_land = null, ?float $area_territory = null, ?string $inventory_number = null, ?int $flats_count = null, ?int $residents_count = null, ?int $accounts_count = null, ?string $construction_features = null, ?float $thermal_actual_expense = null, ?float $thermal_normative_expense = null, ?string $energy_efficiency = null, ?string $energy_audit_date = null, ?string $privatization_start_date = null, ?float $deterioration_total = null, ?float $deterioration_foundation = null, ?float $deterioration_bearing_walls = null, ?float $deterioration_floor = null, ?\StructType\ApiFacade $facade = null, ?\StructType\ApiRoof $roof = null, ?\StructType\ApiBasement $basement = null, ?\StructType\ApiCommonSpace $common_space = null, ?\StructType\ApiChute $chute = null, ?\StructType\ApiHeatingSystem $heating_system = null, ?\StructType\ApiHotWaterSystem $hot_water_system = null, ?\StructType\ApiColdWaterSystem $cold_water_system = null, ?\StructType\ApiSewerageSystem $sewerage_system = null, ?\StructType\ApiElectricitySystem $electricity_system = null, ?\StructType\ApiGasSystem $gas_system = null, ?array $lifts = null, ?\StructType\ApiManagementContract $management_contract = null, ?\StructType\ApiProvider $heating_provider = null, ?\StructType\ApiProvider $electricity_provider = null, ?\StructType\ApiProvider $gas_provider = null, ?\StructType\ApiProvider $hot_water_provider = null, ?\StructType\ApiProvider $cold_water_provider = null, ?\StructType\ApiProvider $drainage_provider = null, ?\StructType\ApiFinance $finance = null)
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
    public function getArea_total(): ?float
    {
        return $this->area_total;
    }
    /**
     * Set area_total value
     * @param float $area_total
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_total(?float $area_total = null): self
    {
        // validation for constraint: float
        if (!is_null($area_total) && !(is_float($area_total) || is_numeric($area_total))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_total, true), gettype($area_total)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_total) && mb_strlen(mb_substr((string) $area_total, false !== mb_strpos((string) $area_total, '.') ? mb_strpos((string) $area_total, '.') + 1 : mb_strlen((string) $area_total))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_total, true), mb_strlen(mb_substr((string) $area_total, mb_strpos((string) $area_total, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_total) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_total)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_total, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_total))), __LINE__);
        }
        $this->area_total = $area_total;
        
        return $this;
    }
    /**
     * Get area_residential value
     * @return float|null
     */
    public function getArea_residential(): ?float
    {
        return $this->area_residential;
    }
    /**
     * Set area_residential value
     * @param float $area_residential
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_residential(?float $area_residential = null): self
    {
        // validation for constraint: float
        if (!is_null($area_residential) && !(is_float($area_residential) || is_numeric($area_residential))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_residential, true), gettype($area_residential)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_residential) && mb_strlen(mb_substr((string) $area_residential, false !== mb_strpos((string) $area_residential, '.') ? mb_strpos((string) $area_residential, '.') + 1 : mb_strlen((string) $area_residential))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_residential, true), mb_strlen(mb_substr((string) $area_residential, mb_strpos((string) $area_residential, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_residential) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_residential)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_residential, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_residential))), __LINE__);
        }
        $this->area_residential = $area_residential;
        
        return $this;
    }
    /**
     * Get area_non_residential value
     * @return float|null
     */
    public function getArea_non_residential(): ?float
    {
        return $this->area_non_residential;
    }
    /**
     * Set area_non_residential value
     * @param float $area_non_residential
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_non_residential(?float $area_non_residential = null): self
    {
        // validation for constraint: float
        if (!is_null($area_non_residential) && !(is_float($area_non_residential) || is_numeric($area_non_residential))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_non_residential, true), gettype($area_non_residential)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_non_residential) && mb_strlen(mb_substr((string) $area_non_residential, false !== mb_strpos((string) $area_non_residential, '.') ? mb_strpos((string) $area_non_residential, '.') + 1 : mb_strlen((string) $area_non_residential))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_non_residential, true), mb_strlen(mb_substr((string) $area_non_residential, mb_strpos((string) $area_non_residential, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_non_residential) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_non_residential)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_non_residential, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_non_residential))), __LINE__);
        }
        $this->area_non_residential = $area_non_residential;
        
        return $this;
    }
    /**
     * Get cadastral_number value
     * @return string|null
     */
    public function getCadastral_number(): ?string
    {
        return $this->cadastral_number;
    }
    /**
     * Set cadastral_number value
     * @param string $cadastral_number
     * @return \StructType\ApiHouseProfileData
     */
    public function setCadastral_number(?string $cadastral_number = null): self
    {
        // validation for constraint: string
        if (!is_null($cadastral_number) && !is_string($cadastral_number)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($cadastral_number, true), gettype($cadastral_number)), __LINE__);
        }
        $this->cadastral_number = $cadastral_number;
        
        return $this;
    }
    /**
     * Get project_type value
     * @return string|null
     */
    public function getProject_type(): ?string
    {
        return $this->project_type;
    }
    /**
     * Set project_type value
     * @param string $project_type
     * @return \StructType\ApiHouseProfileData
     */
    public function setProject_type(?string $project_type = null): self
    {
        // validation for constraint: string
        if (!is_null($project_type) && !is_string($project_type)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($project_type, true), gettype($project_type)), __LINE__);
        }
        $this->project_type = $project_type;
        
        return $this;
    }
    /**
     * Get location_description value
     * @return string|null
     */
    public function getLocation_description(): ?string
    {
        return $this->location_description;
    }
    /**
     * Set location_description value
     * @param string $location_description
     * @return \StructType\ApiHouseProfileData
     */
    public function setLocation_description(?string $location_description = null): self
    {
        // validation for constraint: string
        if (!is_null($location_description) && !is_string($location_description)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($location_description, true), gettype($location_description)), __LINE__);
        }
        $this->location_description = $location_description;
        
        return $this;
    }
    /**
     * Get individual_name value
     * @return string|null
     */
    public function getIndividual_name(): ?string
    {
        return $this->individual_name;
    }
    /**
     * Set individual_name value
     * @param string $individual_name
     * @return \StructType\ApiHouseProfileData
     */
    public function setIndividual_name(?string $individual_name = null): self
    {
        // validation for constraint: string
        if (!is_null($individual_name) && !is_string($individual_name)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($individual_name, true), gettype($individual_name)), __LINE__);
        }
        $this->individual_name = $individual_name;
        
        return $this;
    }
    /**
     * Get house_type value
     * @return string|null
     */
    public function getHouse_type(): ?string
    {
        return $this->house_type;
    }
    /**
     * Set house_type value
     * @uses \EnumType\ApiHouseTypeEnum::valueIsValid()
     * @uses \EnumType\ApiHouseTypeEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $house_type
     * @return \StructType\ApiHouseProfileData
     */
    public function setHouse_type(?string $house_type = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiHouseTypeEnum::valueIsValid($house_type)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiHouseTypeEnum', is_array($house_type) ? implode(', ', $house_type) : var_export($house_type, true), implode(', ', \EnumType\ApiHouseTypeEnum::getValidValues())), __LINE__);
        }
        $this->house_type = $house_type;
        
        return $this;
    }
    /**
     * Get exploitation_start_year value
     * @return string|null
     */
    public function getExploitation_start_year(): ?string
    {
        return $this->exploitation_start_year;
    }
    /**
     * Set exploitation_start_year value
     * @param string $exploitation_start_year
     * @return \StructType\ApiHouseProfileData
     */
    public function setExploitation_start_year(?string $exploitation_start_year = null): self
    {
        // validation for constraint: string
        if (!is_null($exploitation_start_year) && !is_string($exploitation_start_year)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($exploitation_start_year, true), gettype($exploitation_start_year)), __LINE__);
        }
        $this->exploitation_start_year = $exploitation_start_year;
        
        return $this;
    }
    /**
     * Get wall_material value
     * @return string|null
     */
    public function getWall_material(): ?string
    {
        return $this->wall_material;
    }
    /**
     * Set wall_material value
     * @uses \EnumType\ApiHouseWallMaterialEnum::valueIsValid()
     * @uses \EnumType\ApiHouseWallMaterialEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $wall_material
     * @return \StructType\ApiHouseProfileData
     */
    public function setWall_material(?string $wall_material = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiHouseWallMaterialEnum::valueIsValid($wall_material)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiHouseWallMaterialEnum', is_array($wall_material) ? implode(', ', $wall_material) : var_export($wall_material, true), implode(', ', \EnumType\ApiHouseWallMaterialEnum::getValidValues())), __LINE__);
        }
        $this->wall_material = $wall_material;
        
        return $this;
    }
    /**
     * Get floor_type value
     * @return string|null
     */
    public function getFloor_type(): ?string
    {
        return $this->floor_type;
    }
    /**
     * Set floor_type value
     * @uses \EnumType\ApiHouseFloorTypeEnum::valueIsValid()
     * @uses \EnumType\ApiHouseFloorTypeEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $floor_type
     * @return \StructType\ApiHouseProfileData
     */
    public function setFloor_type(?string $floor_type = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiHouseFloorTypeEnum::valueIsValid($floor_type)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiHouseFloorTypeEnum', is_array($floor_type) ? implode(', ', $floor_type) : var_export($floor_type, true), implode(', ', \EnumType\ApiHouseFloorTypeEnum::getValidValues())), __LINE__);
        }
        $this->floor_type = $floor_type;
        
        return $this;
    }
    /**
     * Get storeys_count value
     * @return int|null
     */
    public function getStoreys_count(): ?int
    {
        return $this->storeys_count;
    }
    /**
     * Set storeys_count value
     * @param int $storeys_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setStoreys_count(?int $storeys_count = null): self
    {
        // validation for constraint: int
        if (!is_null($storeys_count) && !(is_int($storeys_count) || ctype_digit($storeys_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($storeys_count, true), gettype($storeys_count)), __LINE__);
        }
        $this->storeys_count = $storeys_count;
        
        return $this;
    }
    /**
     * Get entrance_count value
     * @return int|null
     */
    public function getEntrance_count(): ?int
    {
        return $this->entrance_count;
    }
    /**
     * Set entrance_count value
     * @param int $entrance_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setEntrance_count(?int $entrance_count = null): self
    {
        // validation for constraint: int
        if (!is_null($entrance_count) && !(is_int($entrance_count) || ctype_digit($entrance_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($entrance_count, true), gettype($entrance_count)), __LINE__);
        }
        $this->entrance_count = $entrance_count;
        
        return $this;
    }
    /**
     * Get elevators_count value
     * @return int|null
     */
    public function getElevators_count(): ?int
    {
        return $this->elevators_count;
    }
    /**
     * Set elevators_count value
     * @param int $elevators_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setElevators_count(?int $elevators_count = null): self
    {
        // validation for constraint: int
        if (!is_null($elevators_count) && !(is_int($elevators_count) || ctype_digit($elevators_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($elevators_count, true), gettype($elevators_count)), __LINE__);
        }
        $this->elevators_count = $elevators_count;
        
        return $this;
    }
    /**
     * Get area_private value
     * @return float|null
     */
    public function getArea_private(): ?float
    {
        return $this->area_private;
    }
    /**
     * Set area_private value
     * @param float $area_private
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_private(?float $area_private = null): self
    {
        // validation for constraint: float
        if (!is_null($area_private) && !(is_float($area_private) || is_numeric($area_private))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_private, true), gettype($area_private)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_private) && mb_strlen(mb_substr((string) $area_private, false !== mb_strpos((string) $area_private, '.') ? mb_strpos((string) $area_private, '.') + 1 : mb_strlen((string) $area_private))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_private, true), mb_strlen(mb_substr((string) $area_private, mb_strpos((string) $area_private, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_private) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_private)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_private, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_private))), __LINE__);
        }
        $this->area_private = $area_private;
        
        return $this;
    }
    /**
     * Get area_municipal value
     * @return float|null
     */
    public function getArea_municipal(): ?float
    {
        return $this->area_municipal;
    }
    /**
     * Set area_municipal value
     * @param float $area_municipal
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_municipal(?float $area_municipal = null): self
    {
        // validation for constraint: float
        if (!is_null($area_municipal) && !(is_float($area_municipal) || is_numeric($area_municipal))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_municipal, true), gettype($area_municipal)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_municipal) && mb_strlen(mb_substr((string) $area_municipal, false !== mb_strpos((string) $area_municipal, '.') ? mb_strpos((string) $area_municipal, '.') + 1 : mb_strlen((string) $area_municipal))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_municipal, true), mb_strlen(mb_substr((string) $area_municipal, mb_strpos((string) $area_municipal, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_municipal) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_municipal)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_municipal, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_municipal))), __LINE__);
        }
        $this->area_municipal = $area_municipal;
        
        return $this;
    }
    /**
     * Get area_national value
     * @return float|null
     */
    public function getArea_national(): ?float
    {
        return $this->area_national;
    }
    /**
     * Set area_national value
     * @param float $area_national
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_national(?float $area_national = null): self
    {
        // validation for constraint: float
        if (!is_null($area_national) && !(is_float($area_national) || is_numeric($area_national))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_national, true), gettype($area_national)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_national) && mb_strlen(mb_substr((string) $area_national, false !== mb_strpos((string) $area_national, '.') ? mb_strpos((string) $area_national, '.') + 1 : mb_strlen((string) $area_national))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_national, true), mb_strlen(mb_substr((string) $area_national, mb_strpos((string) $area_national, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_national) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_national)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_national, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_national))), __LINE__);
        }
        $this->area_national = $area_national;
        
        return $this;
    }
    /**
     * Get area_land value
     * @return float|null
     */
    public function getArea_land(): ?float
    {
        return $this->area_land;
    }
    /**
     * Set area_land value
     * @param float $area_land
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_land(?float $area_land = null): self
    {
        // validation for constraint: float
        if (!is_null($area_land) && !(is_float($area_land) || is_numeric($area_land))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_land, true), gettype($area_land)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_land) && mb_strlen(mb_substr((string) $area_land, false !== mb_strpos((string) $area_land, '.') ? mb_strpos((string) $area_land, '.') + 1 : mb_strlen((string) $area_land))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_land, true), mb_strlen(mb_substr((string) $area_land, mb_strpos((string) $area_land, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_land) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_land)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_land, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_land))), __LINE__);
        }
        $this->area_land = $area_land;
        
        return $this;
    }
    /**
     * Get area_territory value
     * @return float|null
     */
    public function getArea_territory(): ?float
    {
        return $this->area_territory;
    }
    /**
     * Set area_territory value
     * @param float $area_territory
     * @return \StructType\ApiHouseProfileData
     */
    public function setArea_territory(?float $area_territory = null): self
    {
        // validation for constraint: float
        if (!is_null($area_territory) && !(is_float($area_territory) || is_numeric($area_territory))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($area_territory, true), gettype($area_territory)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($area_territory) && mb_strlen(mb_substr((string) $area_territory, false !== mb_strpos((string) $area_territory, '.') ? mb_strpos((string) $area_territory, '.') + 1 : mb_strlen((string) $area_territory))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($area_territory, true), mb_strlen(mb_substr((string) $area_territory, mb_strpos((string) $area_territory, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($area_territory) && mb_strlen(preg_replace('/(\D)/', '', (string) $area_territory)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($area_territory, true), mb_strlen(preg_replace('/(\D)/', '', (string) $area_territory))), __LINE__);
        }
        $this->area_territory = $area_territory;
        
        return $this;
    }
    /**
     * Get inventory_number value
     * @return string|null
     */
    public function getInventory_number(): ?string
    {
        return $this->inventory_number;
    }
    /**
     * Set inventory_number value
     * @param string $inventory_number
     * @return \StructType\ApiHouseProfileData
     */
    public function setInventory_number(?string $inventory_number = null): self
    {
        // validation for constraint: string
        if (!is_null($inventory_number) && !is_string($inventory_number)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($inventory_number, true), gettype($inventory_number)), __LINE__);
        }
        $this->inventory_number = $inventory_number;
        
        return $this;
    }
    /**
     * Get flats_count value
     * @return int|null
     */
    public function getFlats_count(): ?int
    {
        return $this->flats_count;
    }
    /**
     * Set flats_count value
     * @param int $flats_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setFlats_count(?int $flats_count = null): self
    {
        // validation for constraint: int
        if (!is_null($flats_count) && !(is_int($flats_count) || ctype_digit($flats_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($flats_count, true), gettype($flats_count)), __LINE__);
        }
        $this->flats_count = $flats_count;
        
        return $this;
    }
    /**
     * Get residents_count value
     * @return int|null
     */
    public function getResidents_count(): ?int
    {
        return $this->residents_count;
    }
    /**
     * Set residents_count value
     * @param int $residents_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setResidents_count(?int $residents_count = null): self
    {
        // validation for constraint: int
        if (!is_null($residents_count) && !(is_int($residents_count) || ctype_digit($residents_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($residents_count, true), gettype($residents_count)), __LINE__);
        }
        $this->residents_count = $residents_count;
        
        return $this;
    }
    /**
     * Get accounts_count value
     * @return int|null
     */
    public function getAccounts_count(): ?int
    {
        return $this->accounts_count;
    }
    /**
     * Set accounts_count value
     * @param int $accounts_count
     * @return \StructType\ApiHouseProfileData
     */
    public function setAccounts_count(?int $accounts_count = null): self
    {
        // validation for constraint: int
        if (!is_null($accounts_count) && !(is_int($accounts_count) || ctype_digit($accounts_count))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($accounts_count, true), gettype($accounts_count)), __LINE__);
        }
        $this->accounts_count = $accounts_count;
        
        return $this;
    }
    /**
     * Get construction_features value
     * @return string|null
     */
    public function getConstruction_features(): ?string
    {
        return $this->construction_features;
    }
    /**
     * Set construction_features value
     * @param string $construction_features
     * @return \StructType\ApiHouseProfileData
     */
    public function setConstruction_features(?string $construction_features = null): self
    {
        // validation for constraint: string
        if (!is_null($construction_features) && !is_string($construction_features)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($construction_features, true), gettype($construction_features)), __LINE__);
        }
        $this->construction_features = $construction_features;
        
        return $this;
    }
    /**
     * Get thermal_actual_expense value
     * @return float|null
     */
    public function getThermal_actual_expense(): ?float
    {
        return $this->thermal_actual_expense;
    }
    /**
     * Set thermal_actual_expense value
     * @param float $thermal_actual_expense
     * @return \StructType\ApiHouseProfileData
     */
    public function setThermal_actual_expense(?float $thermal_actual_expense = null): self
    {
        // validation for constraint: float
        if (!is_null($thermal_actual_expense) && !(is_float($thermal_actual_expense) || is_numeric($thermal_actual_expense))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($thermal_actual_expense, true), gettype($thermal_actual_expense)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($thermal_actual_expense) && mb_strlen(mb_substr((string) $thermal_actual_expense, false !== mb_strpos((string) $thermal_actual_expense, '.') ? mb_strpos((string) $thermal_actual_expense, '.') + 1 : mb_strlen((string) $thermal_actual_expense))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($thermal_actual_expense, true), mb_strlen(mb_substr((string) $thermal_actual_expense, mb_strpos((string) $thermal_actual_expense, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($thermal_actual_expense) && mb_strlen(preg_replace('/(\D)/', '', (string) $thermal_actual_expense)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($thermal_actual_expense, true), mb_strlen(preg_replace('/(\D)/', '', (string) $thermal_actual_expense))), __LINE__);
        }
        $this->thermal_actual_expense = $thermal_actual_expense;
        
        return $this;
    }
    /**
     * Get thermal_normative_expense value
     * @return float|null
     */
    public function getThermal_normative_expense(): ?float
    {
        return $this->thermal_normative_expense;
    }
    /**
     * Set thermal_normative_expense value
     * @param float $thermal_normative_expense
     * @return \StructType\ApiHouseProfileData
     */
    public function setThermal_normative_expense(?float $thermal_normative_expense = null): self
    {
        // validation for constraint: float
        if (!is_null($thermal_normative_expense) && !(is_float($thermal_normative_expense) || is_numeric($thermal_normative_expense))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($thermal_normative_expense, true), gettype($thermal_normative_expense)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($thermal_normative_expense) && mb_strlen(mb_substr((string) $thermal_normative_expense, false !== mb_strpos((string) $thermal_normative_expense, '.') ? mb_strpos((string) $thermal_normative_expense, '.') + 1 : mb_strlen((string) $thermal_normative_expense))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($thermal_normative_expense, true), mb_strlen(mb_substr((string) $thermal_normative_expense, mb_strpos((string) $thermal_normative_expense, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($thermal_normative_expense) && mb_strlen(preg_replace('/(\D)/', '', (string) $thermal_normative_expense)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($thermal_normative_expense, true), mb_strlen(preg_replace('/(\D)/', '', (string) $thermal_normative_expense))), __LINE__);
        }
        $this->thermal_normative_expense = $thermal_normative_expense;
        
        return $this;
    }
    /**
     * Get energy_efficiency value
     * @return string|null
     */
    public function getEnergy_efficiency(): ?string
    {
        return $this->energy_efficiency;
    }
    /**
     * Set energy_efficiency value
     * @uses \EnumType\ApiHouseEnergyEfficiencyClassEnum::valueIsValid()
     * @uses \EnumType\ApiHouseEnergyEfficiencyClassEnum::getValidValues()
     * @throws InvalidArgumentException
     * @param string $energy_efficiency
     * @return \StructType\ApiHouseProfileData
     */
    public function setEnergy_efficiency(?string $energy_efficiency = null): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\ApiHouseEnergyEfficiencyClassEnum::valueIsValid($energy_efficiency)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\ApiHouseEnergyEfficiencyClassEnum', is_array($energy_efficiency) ? implode(', ', $energy_efficiency) : var_export($energy_efficiency, true), implode(', ', \EnumType\ApiHouseEnergyEfficiencyClassEnum::getValidValues())), __LINE__);
        }
        $this->energy_efficiency = $energy_efficiency;
        
        return $this;
    }
    /**
     * Get energy_audit_date value
     * @return string|null
     */
    public function getEnergy_audit_date(): ?string
    {
        return $this->energy_audit_date;
    }
    /**
     * Set energy_audit_date value
     * @param string $energy_audit_date
     * @return \StructType\ApiHouseProfileData
     */
    public function setEnergy_audit_date(?string $energy_audit_date = null): self
    {
        // validation for constraint: string
        if (!is_null($energy_audit_date) && !is_string($energy_audit_date)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($energy_audit_date, true), gettype($energy_audit_date)), __LINE__);
        }
        $this->energy_audit_date = $energy_audit_date;
        
        return $this;
    }
    /**
     * Get privatization_start_date value
     * @return string|null
     */
    public function getPrivatization_start_date(): ?string
    {
        return $this->privatization_start_date;
    }
    /**
     * Set privatization_start_date value
     * @param string $privatization_start_date
     * @return \StructType\ApiHouseProfileData
     */
    public function setPrivatization_start_date(?string $privatization_start_date = null): self
    {
        // validation for constraint: string
        if (!is_null($privatization_start_date) && !is_string($privatization_start_date)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($privatization_start_date, true), gettype($privatization_start_date)), __LINE__);
        }
        $this->privatization_start_date = $privatization_start_date;
        
        return $this;
    }
    /**
     * Get deterioration_total value
     * @return float|null
     */
    public function getDeterioration_total(): ?float
    {
        return $this->deterioration_total;
    }
    /**
     * Set deterioration_total value
     * @param float $deterioration_total
     * @return \StructType\ApiHouseProfileData
     */
    public function setDeterioration_total(?float $deterioration_total = null): self
    {
        // validation for constraint: float
        if (!is_null($deterioration_total) && !(is_float($deterioration_total) || is_numeric($deterioration_total))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($deterioration_total, true), gettype($deterioration_total)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($deterioration_total) && mb_strlen(mb_substr((string) $deterioration_total, false !== mb_strpos((string) $deterioration_total, '.') ? mb_strpos((string) $deterioration_total, '.') + 1 : mb_strlen((string) $deterioration_total))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($deterioration_total, true), mb_strlen(mb_substr((string) $deterioration_total, mb_strpos((string) $deterioration_total, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($deterioration_total) && mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_total)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($deterioration_total, true), mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_total))), __LINE__);
        }
        $this->deterioration_total = $deterioration_total;
        
        return $this;
    }
    /**
     * Get deterioration_foundation value
     * @return float|null
     */
    public function getDeterioration_foundation(): ?float
    {
        return $this->deterioration_foundation;
    }
    /**
     * Set deterioration_foundation value
     * @param float $deterioration_foundation
     * @return \StructType\ApiHouseProfileData
     */
    public function setDeterioration_foundation(?float $deterioration_foundation = null): self
    {
        // validation for constraint: float
        if (!is_null($deterioration_foundation) && !(is_float($deterioration_foundation) || is_numeric($deterioration_foundation))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($deterioration_foundation, true), gettype($deterioration_foundation)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($deterioration_foundation) && mb_strlen(mb_substr((string) $deterioration_foundation, false !== mb_strpos((string) $deterioration_foundation, '.') ? mb_strpos((string) $deterioration_foundation, '.') + 1 : mb_strlen((string) $deterioration_foundation))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($deterioration_foundation, true), mb_strlen(mb_substr((string) $deterioration_foundation, mb_strpos((string) $deterioration_foundation, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($deterioration_foundation) && mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_foundation)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($deterioration_foundation, true), mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_foundation))), __LINE__);
        }
        $this->deterioration_foundation = $deterioration_foundation;
        
        return $this;
    }
    /**
     * Get deterioration_bearing_walls value
     * @return float|null
     */
    public function getDeterioration_bearing_walls(): ?float
    {
        return $this->deterioration_bearing_walls;
    }
    /**
     * Set deterioration_bearing_walls value
     * @param float $deterioration_bearing_walls
     * @return \StructType\ApiHouseProfileData
     */
    public function setDeterioration_bearing_walls(?float $deterioration_bearing_walls = null): self
    {
        // validation for constraint: float
        if (!is_null($deterioration_bearing_walls) && !(is_float($deterioration_bearing_walls) || is_numeric($deterioration_bearing_walls))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($deterioration_bearing_walls, true), gettype($deterioration_bearing_walls)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($deterioration_bearing_walls) && mb_strlen(mb_substr((string) $deterioration_bearing_walls, false !== mb_strpos((string) $deterioration_bearing_walls, '.') ? mb_strpos((string) $deterioration_bearing_walls, '.') + 1 : mb_strlen((string) $deterioration_bearing_walls))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($deterioration_bearing_walls, true), mb_strlen(mb_substr((string) $deterioration_bearing_walls, mb_strpos((string) $deterioration_bearing_walls, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($deterioration_bearing_walls) && mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_bearing_walls)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($deterioration_bearing_walls, true), mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_bearing_walls))), __LINE__);
        }
        $this->deterioration_bearing_walls = $deterioration_bearing_walls;
        
        return $this;
    }
    /**
     * Get deterioration_floor value
     * @return float|null
     */
    public function getDeterioration_floor(): ?float
    {
        return $this->deterioration_floor;
    }
    /**
     * Set deterioration_floor value
     * @param float $deterioration_floor
     * @return \StructType\ApiHouseProfileData
     */
    public function setDeterioration_floor(?float $deterioration_floor = null): self
    {
        // validation for constraint: float
        if (!is_null($deterioration_floor) && !(is_float($deterioration_floor) || is_numeric($deterioration_floor))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($deterioration_floor, true), gettype($deterioration_floor)), __LINE__);
        }
        // validation for constraint: fractionDigits(2)
        if (!is_null($deterioration_floor) && mb_strlen(mb_substr((string) $deterioration_floor, false !== mb_strpos((string) $deterioration_floor, '.') ? mb_strpos((string) $deterioration_floor, '.') + 1 : mb_strlen((string) $deterioration_floor))) > 2) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must at most contain 2 fraction digits, %d given', var_export($deterioration_floor, true), mb_strlen(mb_substr((string) $deterioration_floor, mb_strpos((string) $deterioration_floor, '.') + 1))), __LINE__);
        }
        // validation for constraint: totalDigits(15)
        if (!is_null($deterioration_floor) && mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_floor)) > 15) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, the value must use at most 15 digits, "%d" given', var_export($deterioration_floor, true), mb_strlen(preg_replace('/(\D)/', '', (string) $deterioration_floor))), __LINE__);
        }
        $this->deterioration_floor = $deterioration_floor;
        
        return $this;
    }
    /**
     * Get facade value
     * @return \StructType\ApiFacade|null
     */
    public function getFacade(): ?\StructType\ApiFacade
    {
        return $this->facade;
    }
    /**
     * Set facade value
     * @param \StructType\ApiFacade $facade
     * @return \StructType\ApiHouseProfileData
     */
    public function setFacade(?\StructType\ApiFacade $facade = null): self
    {
        $this->facade = $facade;
        
        return $this;
    }
    /**
     * Get roof value
     * @return \StructType\ApiRoof|null
     */
    public function getRoof(): ?\StructType\ApiRoof
    {
        return $this->roof;
    }
    /**
     * Set roof value
     * @param \StructType\ApiRoof $roof
     * @return \StructType\ApiHouseProfileData
     */
    public function setRoof(?\StructType\ApiRoof $roof = null): self
    {
        $this->roof = $roof;
        
        return $this;
    }
    /**
     * Get basement value
     * @return \StructType\ApiBasement|null
     */
    public function getBasement(): ?\StructType\ApiBasement
    {
        return $this->basement;
    }
    /**
     * Set basement value
     * @param \StructType\ApiBasement $basement
     * @return \StructType\ApiHouseProfileData
     */
    public function setBasement(?\StructType\ApiBasement $basement = null): self
    {
        $this->basement = $basement;
        
        return $this;
    }
    /**
     * Get common_space value
     * @return \StructType\ApiCommonSpace|null
     */
    public function getCommon_space(): ?\StructType\ApiCommonSpace
    {
        return $this->common_space;
    }
    /**
     * Set common_space value
     * @param \StructType\ApiCommonSpace $common_space
     * @return \StructType\ApiHouseProfileData
     */
    public function setCommon_space(?\StructType\ApiCommonSpace $common_space = null): self
    {
        $this->common_space = $common_space;
        
        return $this;
    }
    /**
     * Get chute value
     * @return \StructType\ApiChute|null
     */
    public function getChute(): ?\StructType\ApiChute
    {
        return $this->chute;
    }
    /**
     * Set chute value
     * @param \StructType\ApiChute $chute
     * @return \StructType\ApiHouseProfileData
     */
    public function setChute(?\StructType\ApiChute $chute = null): self
    {
        $this->chute = $chute;
        
        return $this;
    }
    /**
     * Get heating_system value
     * @return \StructType\ApiHeatingSystem|null
     */
    public function getHeating_system(): ?\StructType\ApiHeatingSystem
    {
        return $this->heating_system;
    }
    /**
     * Set heating_system value
     * @param \StructType\ApiHeatingSystem $heating_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setHeating_system(?\StructType\ApiHeatingSystem $heating_system = null): self
    {
        $this->heating_system = $heating_system;
        
        return $this;
    }
    /**
     * Get hot_water_system value
     * @return \StructType\ApiHotWaterSystem|null
     */
    public function getHot_water_system(): ?\StructType\ApiHotWaterSystem
    {
        return $this->hot_water_system;
    }
    /**
     * Set hot_water_system value
     * @param \StructType\ApiHotWaterSystem $hot_water_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setHot_water_system(?\StructType\ApiHotWaterSystem $hot_water_system = null): self
    {
        $this->hot_water_system = $hot_water_system;
        
        return $this;
    }
    /**
     * Get cold_water_system value
     * @return \StructType\ApiColdWaterSystem|null
     */
    public function getCold_water_system(): ?\StructType\ApiColdWaterSystem
    {
        return $this->cold_water_system;
    }
    /**
     * Set cold_water_system value
     * @param \StructType\ApiColdWaterSystem $cold_water_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setCold_water_system(?\StructType\ApiColdWaterSystem $cold_water_system = null): self
    {
        $this->cold_water_system = $cold_water_system;
        
        return $this;
    }
    /**
     * Get sewerage_system value
     * @return \StructType\ApiSewerageSystem|null
     */
    public function getSewerage_system(): ?\StructType\ApiSewerageSystem
    {
        return $this->sewerage_system;
    }
    /**
     * Set sewerage_system value
     * @param \StructType\ApiSewerageSystem $sewerage_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setSewerage_system(?\StructType\ApiSewerageSystem $sewerage_system = null): self
    {
        $this->sewerage_system = $sewerage_system;
        
        return $this;
    }
    /**
     * Get electricity_system value
     * @return \StructType\ApiElectricitySystem|null
     */
    public function getElectricity_system(): ?\StructType\ApiElectricitySystem
    {
        return $this->electricity_system;
    }
    /**
     * Set electricity_system value
     * @param \StructType\ApiElectricitySystem $electricity_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setElectricity_system(?\StructType\ApiElectricitySystem $electricity_system = null): self
    {
        $this->electricity_system = $electricity_system;
        
        return $this;
    }
    /**
     * Get gas_system value
     * @return \StructType\ApiGasSystem|null
     */
    public function getGas_system(): ?\StructType\ApiGasSystem
    {
        return $this->gas_system;
    }
    /**
     * Set gas_system value
     * @param \StructType\ApiGasSystem $gas_system
     * @return \StructType\ApiHouseProfileData
     */
    public function setGas_system(?\StructType\ApiGasSystem $gas_system = null): self
    {
        $this->gas_system = $gas_system;
        
        return $this;
    }
    /**
     * Get lifts value
     * @return \StructType\ApiLift[]
     */
    public function getLifts(): ?array
    {
        return $this->lifts;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setLifts method
     * This method is willingly generated in order to preserve the one-line inline validation within the setLifts method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateLiftsForArrayConstraintFromSetLifts(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $houseProfileDataLiftsItem) {
            // validation for constraint: itemType
            if (!$houseProfileDataLiftsItem instanceof \StructType\ApiLift) {
                $invalidValues[] = is_object($houseProfileDataLiftsItem) ? get_class($houseProfileDataLiftsItem) : sprintf('%s(%s)', gettype($houseProfileDataLiftsItem), var_export($houseProfileDataLiftsItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The lifts property can only contain items of type \StructType\ApiLift, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set lifts value
     * @throws InvalidArgumentException
     * @param \StructType\ApiLift[] $lifts
     * @return \StructType\ApiHouseProfileData
     */
    public function setLifts(?array $lifts = null): self
    {
        // validation for constraint: array
        if ('' !== ($liftsArrayErrorMessage = self::validateLiftsForArrayConstraintFromSetLifts($lifts))) {
            throw new InvalidArgumentException($liftsArrayErrorMessage, __LINE__);
        }
        $this->lifts = $lifts;
        
        return $this;
    }
    /**
     * Add item to lifts value
     * @throws InvalidArgumentException
     * @param \StructType\ApiLift $item
     * @return \StructType\ApiHouseProfileData
     */
    public function addToLifts(\StructType\ApiLift $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiLift) {
            throw new InvalidArgumentException(sprintf('The lifts property can only contain items of type \StructType\ApiLift, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->lifts[] = $item;
        
        return $this;
    }
    /**
     * Get management_contract value
     * @return \StructType\ApiManagementContract|null
     */
    public function getManagement_contract(): ?\StructType\ApiManagementContract
    {
        return $this->management_contract;
    }
    /**
     * Set management_contract value
     * @param \StructType\ApiManagementContract $management_contract
     * @return \StructType\ApiHouseProfileData
     */
    public function setManagement_contract(?\StructType\ApiManagementContract $management_contract = null): self
    {
        $this->management_contract = $management_contract;
        
        return $this;
    }
    /**
     * Get heating_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getHeating_provider(): ?\StructType\ApiProvider
    {
        return $this->heating_provider;
    }
    /**
     * Set heating_provider value
     * @param \StructType\ApiProvider $heating_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setHeating_provider(?\StructType\ApiProvider $heating_provider = null): self
    {
        $this->heating_provider = $heating_provider;
        
        return $this;
    }
    /**
     * Get electricity_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getElectricity_provider(): ?\StructType\ApiProvider
    {
        return $this->electricity_provider;
    }
    /**
     * Set electricity_provider value
     * @param \StructType\ApiProvider $electricity_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setElectricity_provider(?\StructType\ApiProvider $electricity_provider = null): self
    {
        $this->electricity_provider = $electricity_provider;
        
        return $this;
    }
    /**
     * Get gas_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getGas_provider(): ?\StructType\ApiProvider
    {
        return $this->gas_provider;
    }
    /**
     * Set gas_provider value
     * @param \StructType\ApiProvider $gas_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setGas_provider(?\StructType\ApiProvider $gas_provider = null): self
    {
        $this->gas_provider = $gas_provider;
        
        return $this;
    }
    /**
     * Get hot_water_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getHot_water_provider(): ?\StructType\ApiProvider
    {
        return $this->hot_water_provider;
    }
    /**
     * Set hot_water_provider value
     * @param \StructType\ApiProvider $hot_water_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setHot_water_provider(?\StructType\ApiProvider $hot_water_provider = null): self
    {
        $this->hot_water_provider = $hot_water_provider;
        
        return $this;
    }
    /**
     * Get cold_water_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getCold_water_provider(): ?\StructType\ApiProvider
    {
        return $this->cold_water_provider;
    }
    /**
     * Set cold_water_provider value
     * @param \StructType\ApiProvider $cold_water_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setCold_water_provider(?\StructType\ApiProvider $cold_water_provider = null): self
    {
        $this->cold_water_provider = $cold_water_provider;
        
        return $this;
    }
    /**
     * Get drainage_provider value
     * @return \StructType\ApiProvider|null
     */
    public function getDrainage_provider(): ?\StructType\ApiProvider
    {
        return $this->drainage_provider;
    }
    /**
     * Set drainage_provider value
     * @param \StructType\ApiProvider $drainage_provider
     * @return \StructType\ApiHouseProfileData
     */
    public function setDrainage_provider(?\StructType\ApiProvider $drainage_provider = null): self
    {
        $this->drainage_provider = $drainage_provider;
        
        return $this;
    }
    /**
     * Get finance value
     * @return \StructType\ApiFinance|null
     */
    public function getFinance(): ?\StructType\ApiFinance
    {
        return $this->finance;
    }
    /**
     * Set finance value
     * @param \StructType\ApiFinance $finance
     * @return \StructType\ApiHouseProfileData
     */
    public function setFinance(?\StructType\ApiFinance $finance = null): self
    {
        $this->finance = $finance;
        
        return $this;
    }
}
