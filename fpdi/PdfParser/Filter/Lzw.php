<?php

/**
 * This file is part of FPDI
 *
 * @package   setasign\Fpdi
 * @copyright Copyright (c) 2020 Setasign GmbH & Co. KG (https://www.setasign.com)
 * @license   http://opensource.org/licenses/mit-license The MIT License
 */

namespace setasign\Fpdi\PdfParser\Filter;

/**
 * Class for handling LZW encoded data
 */
class Lzw implements FilterInterface
{
    /**
     * @var null|string
     */
    public $data;

    /**
     * @var array
     */
    public $sTable = [];

    /**
     * @var int
     */
    public $dataLength = 0;

    /**
     * @var int
     */
    public $tIdx;

    /**
     * @var int
     */
    public $bitsToGet = 9;

    /**
     * @var int
     */
    public $bytePointer;

    /**
     * @var int
     */
    public $nextData = 0;

    /**
     * @var int
     */
    public $nextBits = 0;

    /**
     * @var array
     */
    public $andTable = [511, 1023, 2047, 4095];

    /**
     * Method to decode LZW compressed data.
     *
     * @param string $data The compressed data
     * @return string The uncompressed data
     * @throws LzwException
     */
    public function decode($data)
    {
        if ($data[0] === "\x00" && $data[1] === "\x01") {
            throw new LzwException(
                'LZW flavour not supported.',
                LzwException::LZW_FLAVOUR_NOT_SUPPORTED
            );
        }

        $this->initsTable();

        $this->data = $data;
        $this->dataLength = \strlen($data);

        // Initialize pointers
        $this->bytePointer = 0;

        $this->nextData = 0;
        $this->nextBits = 0;

        $prevCode = 0;

        $uncompData = '';

        while (($code = $this->getNextCode()) !== 257) {
            if ($code === 256) {
                $this->initsTable();
            } elseif ($prevCode === 256) {
                $uncompData .= $this->sTable[$code];
            } elseif ($code < $this->tIdx) {
                $string = $this->sTable[$code];
                $uncompData .= $string;

                $this->addStringToTable($this->sTable[$prevCode], $string[0]);
            } else {
                $string = $this->sTable[$prevCode];
                $string .= $string[0];
                $uncompData .= $string;

                $this->addStringToTable($string);
            }
            $prevCode = $code;
        }

        return $uncompData;
    }

    /**
     * Initialize the string table.
     */
    public function initsTable()
    {
        $this->sTable = [];

        for ($i = 0; $i < 256; $i++) {
            $this->sTable[$i] = \chr($i);
        }

        $this->tIdx = 258;
        $this->bitsToGet = 9;
    }

    /**
     * Add a new string to the string table.
     *
     * @param string $oldString
     * @param string $newString
     */
    public function addStringToTable($oldString, $newString = '')
    {
        $string = $oldString . $newString;

        // Add this new String to the table
        $this->sTable[$this->tIdx++] = $string;

        if ($this->tIdx === 511) {
            $this->bitsToGet = 10;
        } elseif ($this->tIdx === 1023) {
            $this->bitsToGet = 11;
        } elseif ($this->tIdx === 2047) {
            $this->bitsToGet = 12;
        }
    }

    /**
     * Returns the next 9, 10, 11 or 12 bits.
     *
     * @return int
     */
    public function getNextCode()
    {
        if ($this->bytePointer === $this->dataLength) {
            return 257;
        }

        $this->nextData = ($this->nextData << 8) | (\ord($this->data[$this->bytePointer++]) & 0xff);
        $this->nextBits += 8;

        if ($this->nextBits < $this->bitsToGet) {
            $this->nextData = ($this->nextData << 8) | (\ord($this->data[$this->bytePointer++]) & 0xff);
            $this->nextBits += 8;
        }

        $code = ($this->nextData >> ($this->nextBits - $this->bitsToGet)) & $this->andTable[$this->bitsToGet - 9];
        $this->nextBits -= $this->bitsToGet;

        return $code;
    }
}
