<?php
namespace Jaeger\Thrift;

/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class Batch {
  static $_TSPEC;

  /**
   * @var \Jaeger\Thrift\Process
   */
  public $process = null;
  /**
   * @var \Jaeger\Thrift\Span[]
   */
  public $spans = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'process',
          'type' => TType::STRUCT,
          'class' => '\Jaeger\Thrift\Process',
          ),
        2 => array(
          'var' => 'spans',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Jaeger\Thrift\Span',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['process'])) {
        $this->process = $vals['process'];
      }
      if (isset($vals['spans'])) {
        $this->spans = $vals['spans'];
      }
    }
  }

  public function getName() {
    return 'Batch';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->process = new \Jaeger\Thrift\Process();
            $xfer += $this->process->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::LST) {
            $this->spans = array();
            $_size35 = 0;
            $_etype38 = 0;
            $xfer += $input->readListBegin($_etype38, $_size35);
            for ($_i39 = 0; $_i39 < $_size35; ++$_i39)
            {
              $elem40 = null;
              $elem40 = new \Jaeger\Thrift\Span();
              $xfer += $elem40->read($input);
              $this->spans []= $elem40;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Batch');
    if ($this->process !== null) {
      if (!is_object($this->process)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('process', TType::STRUCT, 1);
      $xfer += $this->process->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->spans !== null) {
      if (!is_array($this->spans)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('spans', TType::LST, 2);
      {
        $output->writeListBegin(TType::STRUCT, count($this->spans));
        {
          foreach ($this->spans as $iter41)
          {
            $xfer += $iter41->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

