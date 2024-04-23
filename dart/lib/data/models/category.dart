import 'package:chuva_dart/data/models/title.dart';
import 'package:json_annotation/json_annotation.dart';

part 'category.g.dart';

@JsonSerializable()
class Category {
  final int id;
  final Title? title;
  @JsonKey(defaultValue: "")
  final String? color;
  @JsonKey(defaultValue: "",name: 'background-color') // JsonKey para mapear nomes de chaves JSON
  final String? backgroundColor;

  Category({
    required this.id,
    required this.title,
    required this.color,
    required this.backgroundColor,
  });

  factory Category.fromJson(Map<String, dynamic> json) => _$CategoryFromJson(json);
  Map<String, dynamic> toJson() => _$CategoryToJson(this);
}