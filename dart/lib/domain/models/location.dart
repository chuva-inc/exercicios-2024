import 'package:chuva_dart/data/models/title.dart';
import 'package:json_annotation/json_annotation.dart';

part 'location.g.dart';

@JsonSerializable()
class Location {
  final int? id;
  final Title? title;
  @JsonKey(defaultValue: 0)
  final int? parent;
  @JsonKey(fromJson: _nullToEmptyString)
  final String? map;

  Location({
    required this.id,
    required this.title,
    required this.parent,
    this.map,
  });

  static String _nullToEmptyString(dynamic value) => value ??= '';

  factory Location.fromJson(Map<String, dynamic> json) => _$LocationFromJson(json);
  Map<String, dynamic> toJson() => _$LocationToJson(this);
}
